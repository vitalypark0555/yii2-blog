<div class="side-wrap">

    <h2 class="sidebar-heading">Recent Comments</h2>
    <?php foreach ($recentComments as $recentComment) : ?>
        <div class="f-entry">
            <h4>
                <<?= $recentComment->post->title ?></a>
            </h4>
            <h5>
                <a href="<?= \yii\helpers\Url::to(['site/post', 'id' => $recentComment->post->id, '#' => 'comment-' . $recentComment->id]) ?>">
                    <span><i class="icon-calendar3"></i> <?= date('d.m.y h:i:s', $recentComment->create_time) ?></span>
                    <b><?= $recentComment->author ?></b> says:</a>
            </h5>
            <h4>
                <i>
                    <?= \yii\helpers\BaseStringHelper::truncate($recentComment->content, 30) ?></i>
            </h4>
        </div>
    <?php endforeach; ?>
</div>