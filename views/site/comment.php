<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="comment-form">
    <?php $form = ActiveForm::begin([
        'id' => 'comment-form',
        'enableAjaxValidation' => true
    ]); ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'author')->textInput(['maxlength' => 128, 'placeholder' => 'Enter your name'])->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'email')->textInput(['maxlength' => 128, 'placeholder' => 'Enter your email'])->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'url')->textInput(['maxlength' => 128, 'placeholder' => 'Enter your website'])->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'content')->textarea(['rows' => 12, 'placeholder' => 'Enter your comment'])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Post Comment', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
