<?php

class News
{

    public static function getAllNews()
    {

        $db = Db::getDbConnection();

        $items = array();

        $i = 0;

        $news = 'SELECT * FROM product';
        $query = $db->query($news);
        while ($row = $query->fetch()) {
            $items[$i]['id'] = $row['0'];
            $items[$i]['firstName'] = $row['1'];
            $items[$i]['lastName'] = $row['2'];
            $items[$i]['email'] = $row['3'];
            $items[$i]['address'] = $row['4'];
            $items[$i]['phone'] = $row['5'];
            $items[$i]['workID'] = $row['6'];
            $items[$i]['position'] = $row['7'];
            $i++;
        }
        return $items;
    }

    public static function getItem($id)
    {

        $db = Db::getDbConnection();

        $id = intval($id);

        $query = 'SELECT * FROM person WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $items = $statement->fetch(PDO::FETCH_ASSOC);
        return $items;

    }

}
