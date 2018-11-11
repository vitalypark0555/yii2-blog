<aside class="sidebar">
    <div class="side">
        <?php use yii\widgets\ActiveForm;

        $form = ActiveForm::begin([
            'action' => ['search'],
            'method' => 'get'
        ]); ?>
        <div class="form-group">

            <input type="text" class="form-control" id="search" name="query" placeholder="Enter any key to search...">
            <button type="submit" class="btn btn-primary"><i class="icon-search3"></i></button>

        </div>
        <?php ActiveForm::end(); ?>

    </div>
    <?= \app\widgets\CategoriesWidget::widget() ?>
    <?= \app\widgets\RecentPostsWidget::widget() ?>
    <?= \app\widgets\RecentCommentsWidget::widget() ?>
    <?= \app\widgets\TagsWidget::widget() ?>
</aside>