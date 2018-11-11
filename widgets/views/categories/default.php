<div class="side-wrap">
    <h2 class="sidebar-heading">Categories</h2>
    <ul class="category">
        <?php foreach ($categories as $category) : ?>
            <li><a href="<?= \yii\helpers\Url::to(['category/' . $category->id]) ?>"><i
                            class="icon-check"></i> <?= $category->name ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>