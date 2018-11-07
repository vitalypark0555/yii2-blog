<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box box-primary">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'content:ntext',
                    [
                        'attribute' => 'status',
                        'value' => function ($model) {

                            return \app\models\Lookup::item("CommentStatus", $model->status);
                        }
                    ],
                    'create_time:datetime',
                    'author',
                    'email:email',
                    'url:url',
                    [
                        'attribute' => 'post_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::a($model->post->title, ['/site/post', 'id' => $model->post->id]);
                        }
                    ]
                ],
            ]) ?>
        </div>
    </div>
</div>
