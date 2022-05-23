<?php

class Db
{

    public static function getDbConnection()
    {
        $dsn = 'mysql:host=localhost;dbname=zinchenko_ecommerce';
        $username = 'root';
        $password = 'root';

        $db = new PDO($dsn, $username, $password);

        // if ($db) {
        //     echo '<pre>';
        //     echo "connection established";
        //     echo '</pre>';
        // }

        return $db;
    }

}
