<?php

class ProductController
{

    public function actionIndex()
    {

        require_once ROOT . '/views/product/product.php';

        return true;
    }

    public function actionList($id)
    {

        require_once ROOT . '/views/product/product.php';

        return true;
    }
}
