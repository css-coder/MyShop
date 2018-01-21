<?php

    class BlogController
    {
        public function actionIndex()
        {

            $blogCategories = [];
            $blogCategories = BlogCategory::getBlogCategoryList();

            $latestPosts = [];
            $latestPosts = Blog::getLatestBlogPosts(2);

            require_once ROOT . '/views/blog/index.php';

            return true;
        }

        public function actionCategory($blogCategoryById)
        {

            $blogCategories = [];
            $blogCategories = BlogCategory::getBlogCategoryList();

            $categoryPosts = [];
            $categoryPosts = Blog::getBlogPostsListCategoryById($blogCategoryById, 1);

            require_once ROOT . '/views/blog/category.php';

            return true;
        }

        public function actionPost($PostId)
        {

            $blogCategories = [];
            $blogCategories = BlogCategory::getBlogCategoryList();

            $post = [];
            $post = Blog::getPostById($PostId);

            require_once ROOT . '/views/blog/post.php';

            return true;
        }


    }