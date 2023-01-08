<?php

class Fetch
{

    public static function first()
    {
        $db = Db::getDbConnection();

        // Executing Simple Query (go to: http://localhost:8888/query)
        $query = "SELECT * FROM product";
        $stm = $db->query($query);
        foreach ($stm as $row) {
            // echo "<pre>";
            echo $row['id'];
            // echo "</pre>";
            echo "<pre>";
            echo $row['name'];
            echo "</pre>";
            // echo "<pre>";
            echo $row['code'];
            // echo "</pre>";
        }

    }

    public static function second()
    {
        $db = Db::getDbConnection();

        // Fetch (go to: http://localhost:8888/fetch)
        $query = "SELECT * FROM product";
        $stm = $db->query($query);
        while ($row = $stm->fetch()) {
            // echo "<pre>";
            echo $row['id'];
            // echo "</pre>";
            echo "<pre>";
            echo $row['name'];
            echo "</pre>";
            // echo "<pre>";
            echo $row['code'];
            // echo "</pre>";

            // echo "<pre>";
            echo $row['0'];
            // echo "</pre>";
            echo "<pre>";
            echo $row['1'];
            echo "</pre>";
            // echo "<pre>";
            echo $row['2'];
            // echo "</pre>";
        }
    }

    public static function third()
    {

        $db = Db::getDbConnection();

        // FetchAll (go to: http://localhost:8888/all)
        $query = "SELECT * FROM product";
        $stm = $db->query($query);
        $result = $stm->fetchAll();
        echo "<pre>";
        print_r($result);
        echo "</pre>";

        $query = "SELECT * FROM product";
        $assoc = $db->query($query);
        $fetch_assoc = $assoc->fetchAll(PDO::FETCH_ASSOC);
        echo "<pre>";
        print_r($fetch_assoc);
        echo "</pre>";

        $query = "SELECT * FROM product";
        $assoc = $db->query($query);
        $fetch_assoc = $assoc->fetchAll(PDO::FETCH_NUM);
        echo "<pre>";
        print_r($fetch_assoc);
        echo "</pre>";

        // Can't select *. Must be two columns only!!!
        $query = "SELECT name,brand FROM product";
        $assoc = $db->query($query);
        $fetch_assoc = $assoc->fetchAll(PDO::FETCH_KEY_PAIR);
        echo "<pre>";
        print_r($fetch_assoc);
        echo "</pre>";

    }

    public static function fourth()
    {

        $db = Db::getDbConnection();

        // oneColumn (go to: http://localhost:8888/column)
        $query = "SELECT * FROM product";
        $column = $db->query($query);
        while ($one = $column->fetchColumn(1)) {
            echo "<pre>";
            print_r($one);
            echo "</pre>";
        }

    }
}
