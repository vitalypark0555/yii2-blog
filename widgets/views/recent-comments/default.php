<div class="side-wrap">

    <h2 class="sidebar-heading">Recent Comments</h2>
    <?php foreach ($recentComments as $recentComment) : ?>
        <div class="f-entry">
            <div class="desc">
                <h5>
                    <span><i class="icon-calendar3"></i> <?= date('F j, Y h:i:s', $recentComment->create_time) ?></span>
                </h5>
                <h5>
                    <a href="<?= \yii\helpers\Url::to(['site/post', 'id' => $recentComment->post->id, '#' => 'comment-' . $recentComment->id]) ?>">
                        <b><?= $recentComment->author ?></b> says:</a>
                </h5>
                <h4>
                    <i>
                        <?= \yii\helpers\BaseStringHelper::truncate($recentComment->content, 30) ?></i>
                </h4>
            </div>
        </div>
    <?php endforeach; ?>
</div>