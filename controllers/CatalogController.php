<?php

    class CatalogController
    {

        public function actionIndex()
        {
            $categories = array();
            $categories = Category::getCategoriesList();

            // Вывод последних товаров в каталоге
            $latestProducts = array();
            $latestProducts = Product::getLatestProducts(3);

            require_once ROOT . '/views/catalog/index.php';
            return true;
        }

        public function actionCategory($categoryId, $page = 1)
        {

            $categories = array();
            $categories = Category::getCategoriesList();

            // Вывод последних товаров в категории
            $categoryProducts = array();
            $categoryProducts = Product::getProductsListByCategory($categoryId, 3, $page);

            $total = Product::getTotalProductsInCategory($categoryId);

            // Создаем объект Pagination - постраничная навигация
            $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

            require_once ROOT . '/views/catalog/category.php';
            return true;
        }

    }