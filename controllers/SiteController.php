<?php

namespace app\controllers;

use app\models\Comment;
use app\models\LoginForm;
use app\models\Post;
use app\models\Search;
use Yii;
use yii\data\Pagination;
use yii\data\SqlDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($tag = null)
    {
        $query = Post::find()->where(['status' => Post::STATUS_PUBLISHED])
            ->orderBy("id DESC");
        if (!empty($tag)) {
            $query->andWhere(new \yii\db\Expression('FIND_IN_SET(:tag,tags)'))->addParams([':tag' => $tag]);
        }
        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count()
        ]);

        $posts = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'posts' => $posts,
            'pagination' => $pagination,
        ]);
    }

    public function actionTag($tag)
    {
        $query = Post::find()->where(['status' => Post::STATUS_PUBLISHED])
            ->andWhere(new \yii\db\Expression('FIND_IN_SET(:tag,tags)'))->addParams([':tag' => $tag])
            ->orderBy("id DESC");;
        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count()
        ]);
        $posts = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'posts' => $posts,
            'pagination' => $pagination,
        ]);
    }

    public function actionCategory($category_id)
    {
        $query = Post::find()->where(['status' => Post::STATUS_PUBLISHED])
            ->andWhere(['category_id' => intval($category_id)])
            ->orderBy("id DESC");;
        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count()
        ]);
        $posts = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'posts' => $posts,
            'pagination' => $pagination,
        ]);
    }

    public function actionPost($id)
    {
        $post = Post::find()->where(['id' => intval($id)])->one();
        $comment = new Comment();
        if (Yii::$app->request->isAjax && $comment->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($comment);
        }

        if ($comment->load(Yii::$app->request->post())) {
            if ($post->addComment($comment)) {
                if ($comment->status == Comment::STATUS_PENDING)
                    Yii::$app->session->setFlash('commentSubmitted', 'Thank you for your comment.
                Your comment will be posted once it is approved.');
            }
        }
        if (empty($post))
            throw new NotFoundHttpException('The requested page does not exist.');
        return $this->render('single', [
            'post' => $post,
            'comment' => $comment
        ]);
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSearch()
    {
        $search = new Search();
        $search->query = Yii::$app->request->queryParams['query'];
        $count = $search->getCount();
        $no_result_text = 'Search result on: ' . $search->query;
        $results = new SqlDataProvider([
            'sql' => $search->getQueryString(),
            'params' => [':query' => '%' . $search->query . '%'],
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 10
            ]]);
        if (!$count) {
            $no_result_text = '"' . $search->query . '" ' . 'is not found';
        }
        return $this->render('search', [
            'results' => $results->models,
            'pagination' => $results->pagination,
            'search' => $search,
            'no_result_text' => $no_result_text,
        ]);
    }
}
