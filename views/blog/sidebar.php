<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Рубрики</h2>
        <div class="panel-group category-products">
            <?php foreach ($blogCategories as $blogCategory) { ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="/blogcategory/<?php echo $blogCategory['id']; ?>" class="<?php if ($blogCategoryById == $blogCategory['id']) echo 'active'; ?>"><?php echo $blogCategory['title']; ?></a></h4>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>