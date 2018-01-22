<?php

    class BlogController
    {
        public function actionIndex()
        {

            $blogCategories = [];
            $blogCategories = BlogCategory::getBlogCategoryList();

            $latestPosts = [];
            $latestPosts = Blog::getLatestBlogPosts(4);

            require_once ROOT . '/views/blog/index.php';

            return true;
        }

        public function actionCategory($blogCategoryById)
        {

            $blogCategories = [];
            $blogCategories = BlogCategory::getBlogCategoryList();

            $categoryPosts = [];
            $categoryPosts = Blog::getBlogPostsListCategoryById($blogCategoryById, 3);

            require_once ROOT . '/views/blog/category.php';

            return true;
        }

        public function actionPost($postId)
        {

            $blogCategories = [];
            $blogCategories = BlogCategory::getBlogCategoryList();

            if ($postId) {
                $post = Blog::getPostById($postId);
                require_once ROOT . '/views/blog/post.php';
            }

            return true;
        }


    }