<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/views/blog/sidebar.php'; ?>

            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Последние записи в блоге</h2>
                    <?php foreach ($latestPosts as $post) { ?>
                    <div class="single-blog-post">
                        <h3><?php echo $post['title']; ?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-calendar"></i></li>
                                <!--<li><i class="fa fa-clock-o"></i> 13:33</li>-->
                            </ul>
                        </div>
                        <a href="">
                            <img src="images/blog/blog-one.jpg" alt="">
                        </a>
                        <p><?php echo $post['short_description']; ?></p>
                        <a  class="btn btn-primary" href="/post/<?php echo $post['id']; ?>">Читать полностью</a>
                    </div>
                    <hr>
                <?php } ?>

                    <div class="pagination-area">
                        <!-- pagination -->
                        <?php //echo $pagination->get(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include ROOT . '/views/layouts/footer.php';
?>
