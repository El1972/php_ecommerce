<?php

return array(

    'blogs/([0-9]+)' => 'blog/blog/$1',
    'products/([0-9]+)' => 'product/list/$1',
    '([0-9]+)' => 'home/item/$1',

    'contact' => 'contact/index',
    'blogs' => 'blog/index',
    'user/logout' => 'user/logout',
    'user/login' => 'user/login',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    'products' => 'product/index',
    'user/register' => 'user/register',
    '' => 'home/index',

);
