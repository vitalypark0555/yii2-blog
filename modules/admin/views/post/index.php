<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'title',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a(Html::encode($data->title), $data->url);
                        },
                    ],
                    'content:ntext',
                    'tags:ntext',
                    [
                        'attribute' => 'status',
                        'value' => function ($data) {
                            return \app\models\Lookup::item("PostStatus", $data->status);
                        },


                    ],
                    //'create_time:datetime',
                    //'update_time:datetime',
                    //'author_id',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
