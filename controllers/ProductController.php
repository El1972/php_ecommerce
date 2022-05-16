<?php

class ProductController
{

    public function actionIndex()
    {

        require_once ROOT . '/views/pages/product.php';

        return true;
    }

    public function actionList($id)
    {

        require_once ROOT . '/views/pages/product.php';

        return true;
    }
}
