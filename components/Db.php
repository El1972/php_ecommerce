<?php

class Db
{

    public static function getDbConnection()
    {
        $dsn = 'mysql:host=localhost;dbname=mosh';
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
