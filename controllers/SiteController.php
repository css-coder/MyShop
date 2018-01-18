<?php

    include_once ROOT . '/models/Category.php';
    include_once ROOT . '/models/Product.php';

    class SiteController
    {

        public function actionIndex()
        {
            $categories = array();
            $categories = Category::getCategoriesList();

            // Вывод последних товаров на главной
            $latestProducts = array();
            $latestProducts = Product::getLatestProducts(6);

            require_once ROOT . '/views/site/index.php';
            return true;
        }

    }