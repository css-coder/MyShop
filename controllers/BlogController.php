<?php

    include_once ROOT . '/models/Blog.php';

    class BlogController
    {
        public static function actionIndex()
        {
            $latestPosts = array();
            $latestPosts = Blog::getBlogPostsListByCategory(2);

            require_once ROOT . '/views/blog/index.php';

            return $latestPosts;
        }
    }