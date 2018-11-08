<div class="side-wrap">

    <h2 class="sidebar-heading">Recent Posts</h2>
    <?php foreach ($recentPosts as $recentPost) : ?>
        <div class="f-entry">
            <a href="#" class="featured-img" style="background-image: url(images/blog-1.jpg);"></a>
            <div class="desc">
                <span><i class="icon-calendar3"></i> <?= date('F j, Y', $recentPost->create_time) ?></span>
                <h3>
                    <a href="<?= \yii\helpers\Url::to(['site/post', 'id' => $recentPost->id]) ?>"><?= $recentPost->title ?></a>
                </h3>
            </div>
        </div>
    <?php endforeach; ?>
</div>