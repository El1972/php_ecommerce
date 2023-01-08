<?php

require_once ROOT . '/models/Cart.php';

class Cart
{

    public static function addProduct($id)
    {
        $id = intval($id);

        $productsInCart = array();

        // if session already has some items
        if (isset($_SESSION['products'])) {

            // then we'll need to go through them
            // and place them in our array
            $productsInCart = $_SESSION['products'];
        }

        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]++;
        } else {
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    }

    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

}
