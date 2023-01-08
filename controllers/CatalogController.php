<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class CatalogController
{

    public function actionIndex()
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $products = array();
        $products = Product::getLatestProducts(3);

        require_once ROOT . '/views/catalog/index.php';

        return true;

    }

}
