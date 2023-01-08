<?php

include_once ROOT . '/models/News.php';
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class HomeController
{

    public function actionIndex()
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6);

        $items = array();
        $items = News::getAllNews();

        require_once ROOT . '/views/home/home.php';

        return true;
    }

    public function actionItem($id)
    {

        if ($id) {
            $newsItem = News::getItem($id);
            print_r($newsItem);
        }
        return true;
    }

}
