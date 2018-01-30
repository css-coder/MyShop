<?php

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

	    public function actionContacts()
	    {
		    echo 'Страница контактов';

		    require_once ROOT . '/views/site/contacts.php';
		    return true;
	    }

    }