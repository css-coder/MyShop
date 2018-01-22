<?php

    return [

        'post/([0-9]+)' => 'blog/post/$1', // actionPost в BlogController
        'blogcategory/([0-9]+)' => 'blog/category/$1', // actionCategory в BlogController
        'blog' => 'blog/index', // actionIndex в BlogController

        'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
        'catalog' => 'catalog/index', // actionIndex в CatalogController

        'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController
        'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController

        'user/login' => 'user/login', // actionLogin в UserController

        '' => 'site/index', // actionIndex в SiteController
    ];