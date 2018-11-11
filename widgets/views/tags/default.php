<div class="side-wrap">
    <h2 class="sidebar-heading">Tags</h2>
    <p class="tags">
        <?php foreach ($tags as $tag): ?>
            <span><a href="<?= \yii\helpers\Url::to(['tag/' . $tag->name]) ?>"><i
                            class="icon-tag"></i> <?= $tag->name ?></a></span>
        <?php endforeach; ?>
    </p>
</div>