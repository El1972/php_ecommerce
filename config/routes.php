<?php

return array(

    'blogs/([0-9]+)' => 'blog/blog/$1',
    'product/([0-9]+)' => 'product/list/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd in CartController
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    '([0-9]+)' => 'home/item/$1',

    'query' => 'fetch/query',
    'fetch' => 'fetch/fetch',
    'all' => 'fetch/all',
    'column' => 'fetch/column',
    'cart' => 'cart/index',
    'contact' => 'contact/index',
    'blogs' => 'blog/index',
    'user/logout' => 'user/logout',
    'user/login' => 'user/login',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    'products' => 'product/index',
    'user/register' => 'user/register',
    'home' => 'home/index',

);
