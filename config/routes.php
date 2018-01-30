<?php

    return [

    	// Blog
        'post/([0-9]+)' => 'blog/post/$1', // actionPost в BlogController
        'blogcategory/([0-9]+)/page-([0-9]+)' => 'blog/category/$1/$2', // actionCategory в BlogController
        'blogcategory/([0-9]+)' => 'blog/category/$1', // actionCategory в BlogController
        'blog/page-([0-9]+)' => 'blog/index/$1', // actionIndex в BlogController
        'blog' => 'blog/index', // actionIndex в BlogController

	    // Catalog
        'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
        'catalog' => 'catalog/index', // actionIndex в CatalogController
        'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController
        'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController

	    // Users
        'user/login' => 'user/login', // actionLogin в UserController
        'user/logout' => 'user/logout', // actionLogout в UserController
        'user/register' => 'user/register', // actionRegister в UserController
        'cabinet/history' => 'cabinet/history', // actionHistory в CabinetController
        'cabinet/edit' => 'cabinet/edit', // actionEdit в CabinetController
        'cabinet' => 'cabinet/index', // actionCabinet в CabinetController

	    // Page
	    'contacts' => 'site/contacts',
	    'about' => 'site/about',

	    // Index
        '' => 'site/index', // actionIndex в SiteController
    ];