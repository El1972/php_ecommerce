<?php

require_once ROOT . '/models/Cart.php';

class CartController
{

    public function actionIndex()
    {

        require_once ROOT . '/views/cart/cart.php';

        return true;
    }

    public function actionAdd($id)
    {

        echo Cart::addProduct($id); // adding item to the cart

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");

        return true;
    }

    // Ajax request was sent to this action
    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id); // adding item to the cart

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");

        return true;
    }

}
