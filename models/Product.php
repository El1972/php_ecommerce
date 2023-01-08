<?php

class Product
{

    const SHOW_BY_DEFAULT = 10;

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {

        $count = intval($count);

        $db = Db::getDbConnection();

        $productsLsit = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product '
            . 'WHERE status = "1"'
            . 'ORDER BY id DESC '
            . 'LIMIT ' . $count);

        $i = 0;

        while ($row = $result->fetch()) {
            $productsLsit[$i]['id'] = $row['id'];
            $productsLsit[$i]['name'] = $row['name'];
            $productsLsit[$i]['image'] = $row['image'];
            $productsLsit[$i]['price'] = $row['price'];
            $productsLsit[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsLsit;
    }

}
