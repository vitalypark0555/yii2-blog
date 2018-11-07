<?php

/* @var $this yii\web\View */
?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <article class="blog-entry">
            <div class="blog-wrap">
                <span class="category text-center"><a href="#">Category</a></span>
                <h2 class="text-center"><a href="#"><?= $post->title ?></a></h2>
                <div class="blog-image">
                    <div class="owl-carousel owl-carousel2 blog-item">
                        <div class="item">
                            <a href="#" class="blog image-popup-link" style="background-image: url(images/blog-1.jpg);">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="blog image-popup-link" style="background-image: url(images/blog-2.jpg);">
                            </a>
                        </div>
                    </div>
                    <ul class="share">
                        <li class="text-vertical"><i class="icon-share3"></i></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-googleplus"></i></a></li>
                    </ul>
                </div>
                <span class="category text-center"><a href="#"><i
                                class="icon-calendar3"></i> <?= date('F j, Y', $post->create_time) ?></a> | <a
                            href="#" class="posted-by"><i class="icon-user2"></i> by <?= $post->author->username ?></a> | <a
                            href="#"><i
                                class="icon-bubble3"></i> <?= $post->commentsCount ?> Comments</a></span>
            </div>
            <div class="desc">
                <p>
                    <?= $post->content ?>
                </p>
            </div>
        </article>
        <div class="comment-box">
            <h2 class="colorlib-heading-2"><?= $post->commentsCount ?> Comments</h2>
            <?php foreach ($post->comments as $com) : ?>
                <div class="comment-post">
                    <div class="user" style="background-image: url(images/person1.jpg);"></div>
                    <div class="desc">
                        <h3><?= $com->author ?> <span><?= date('F j, Y h:i:s', $post->create_time) ?></span></h3>
                        <p><?= $com->content ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="comment-area">
            <h2 class="colorlib-heading-2">Leave a comment</h2>
            <?php if (Yii::$app->session->hasFlash('commentSubmitted')): ?>
                <div class="flash-success">
                    <?php echo Yii::$app->session->getFlash('commentSubmitted'); ?>
                </div>
            <?php else: ?>
                <?= $this->render('comment', [
                    'model' => $comment
                ]) ?>
            <?php endif; ?>
        </div>
    </div>
</div>