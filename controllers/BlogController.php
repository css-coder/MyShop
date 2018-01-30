<?php

    class BlogController
    {
        public function actionIndex()
        {

            $blogCategories = [];
            $blogCategories = BlogCategory::getBlogCategoryList();

            $latestPosts = [];
            $latestPosts = Blog::getLatestBlogPosts(3);

            require_once ROOT . '/views/blog/index.php';

            return true;
        }

        public function actionCategory($blogCategoryById, $page = 1)
        {

            $blogCategories = [];
            $blogCategories = BlogCategory::getBlogCategoryList();

            $categoryPosts = [];
            $categoryPosts = Blog::getBlogPostsListCategoryById($blogCategoryById, 2, $page);

            $total = Blog::getTotalPostsInCategory($blogCategoryById);

	        // Создаем объект Pagination - постраничная навигация
	        $pagination = new Pagination($total, $page, 2, 'page-');

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