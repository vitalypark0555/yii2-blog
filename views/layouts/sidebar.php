<aside class="sidebar">
    <div class="side">
        <div class="form-group">
            <input type="text" class="form-control" id="search" placeholder="Enter any key to search...">
            <button type="submit" class="btn btn-primary"><i class="icon-search3"></i></button>
        </div>
    </div>
    <div class="side-wrap">

        <h2 class="sidebar-heading">Recent Post</h2>
        <?php foreach ($recentPosts as $recentPost) : ?>
            <div class="f-entry">
                <a href="#" class="featured-img" style="background-image: url(images/blog-1.jpg);"></a>
                <div class="desc">
                    <span><i class="icon-calendar3"></i> <?= date('F j, Y', $recentPost->create_time) ?></span>
                    <h3><a href="#"><?= $recentPost->title ?></a></h3>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="side-wrap">
        <h2 class="sidebar-heading">Categories</h2>
        <ul class="category">
            <li><a href="#"><i class="icon-check"></i> Blog</a></li>
            <li><a href="#"><i class="icon-check"></i> Lifestyle</a></li>
            <li><a href="#"><i class="icon-check"></i> Travel</a></li>
            <li><a href="#"><i class="icon-check"></i> Fashion</a></li>
        </ul>
    </div>
    <div class="side-wrap">
        <h2 class="sidebar-heading">Tags</h2>
        <p class="tags">
            <?php foreach ($tags as $tag): ?>
                <span><a href="#"><i class="icon-tag"></i> <?= $tag->name ?></a></span>
            <?php endforeach; ?>
        </p>
    </div>

</aside>