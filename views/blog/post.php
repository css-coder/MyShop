<?php include ROOT . '/views/layouts/header.php'?>

<section>
    <div class="container">
        <div class="row">
            <?php include ROOT . '/views/blog/sidebar.php'?>

            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Запись в блоге</h2>
                    <div class="single-blog-post">
                        <h3><?php echo $post['title']; ?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-calendar"></i><?php echo $post['date']; ?></li>
                                <!--<li><i class="fa fa-clock-o"></i> 13:33</li>-->
                            </ul>
                        </div>
                        <a href="">
                            <img src="images/blog/blog-one.jpg" alt="">
                        </a>

                        <p>
                            <?php echo $post['description']; ?>
                        </p>
                        <div class="pager-area">
                            <div class="pager pull-right">
                                <a href="/blog/">Назад в блог</a>
                            </div>
                        </div>
                    </div>
                </div><!--/blog-post-area-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'?>