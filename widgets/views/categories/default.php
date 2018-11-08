<div class="side-wrap">
    <h2 class="sidebar-heading">Categories</h2>
    <?php foreach ($categories as $category) : ?>
        <li><a href="#"><i class="icon-check"></i><?= $category->name ?></a></li>
    <?php endforeach; ?>
</div>