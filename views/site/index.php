<div class="row">
    <div class="content">
        <?php foreach ($posts as $post) : ?>
            <article class="blog-entry">
                <div class="blog-wrap">
                    <span class="category text-center"><a
                                href="<?= \yii\helpers\Url::to(['site/post', 'id' => $post->id]) ?>">Health</a> | <a
                                href="<?= \yii\helpers\Url::to(['site/post', 'id' => $post->id]) ?>">Workout</a></span>
                    <h2 class="text-center"><a
                                href="<?= \yii\helpers\Url::to(['site/post', 'id' => $post->id]) ?>"><?= $post->title ?></a>
                    </h2>
                    <div class="blog-image">
                        <a href="<?= \yii\helpers\Url::to(['site/post', 'id' => $post->id]) ?>"
                           class="blog-img text-center"
                           style="background-image: url(images/blog-2.jpg);"><span><i class="icon-link"></i></span></a>
                        <ul class="share">
                            <li class="text-vertical"><i class="icon-share3"></i></li>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-googleplus"></i></a></li>
                    </div>
                    <span class="category text-center"><a
                                href="<?= \yii\helpers\Url::to(['site/post', 'id' => $post->id]) ?>"><i
                                    class="icon-calendar3"></i> <?= date('F j, Y', $post->create_time) ?></a> | <a
                                href="<?= \yii\helpers\Url::to(['site/post', 'id' => $post->id]) ?>"
                                class="posted-by"><i
                                    class="icon-user2"></i> by <?= $post->author->username ?></a> | <a
                                href="<?= \yii\helpers\Url::to(['site/post', 'id' => $post->id]) ?>"><i
                                    class="icon-bubble3"></i> <?= $post->commentsCount ?>
                            Comments</a></span>
                </div>
                <div class="desc">
                    <p><?= \yii\helpers\BaseStringHelper::truncate($post->content, 300) ?></p>
                </div>
                <p class="text-center"><a href="<?= \yii\helpers\Url::to(['site/post', 'id' => $post->id]) ?>"
                                          class="btn btn-primary btn-custom">Continue
                        Reading</a></p>
            </article>
        <?php endforeach; ?>
        <div class="row">
            <div class="col-md-12 text-center">
                <?= \yii\widgets\LinkPager::widget([
                    'pagination' => $pagination,
                    'options' => ['class' => 'pagination']
                ]) ?>
            </div>
        </div>
    </div>
    <?= $this->render(
        '../layouts/sidebar.php',
        [
            'tags' => $tags,
            'recentPosts' => $recentPosts
        ]
    ) ?>
</div>