<aside class="sidebar">
    <div class="side">
        <div class="form-group">
            <?php use yii\widgets\ActiveForm;

            $form = ActiveForm::begin([
                'action' => ['search'],
                'method' => 'get'
            ]); ?>
            <input type="text" class="form-control" id="query" name="query" placeholder="Enter any key to search...">
            <button type="submit" class="btn btn-primary"><i class="icon-search3"></i></button>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <?= \app\widgets\CategoriesWidget::widget() ?>
    <?= \app\widgets\RecentPostsWidget::widget() ?>
    <?= \app\widgets\RecentCommentsWidget::widget() ?>
    <?= \app\widgets\TagsWidget::widget() ?>
</aside>