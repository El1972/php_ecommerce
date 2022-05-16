<?php

class HomeController
{

    public function actionIndex()
    {

        $items = array();
        $items = News::getAllNews();

        require_once ROOT . '/views/home/index.php';

        return true;
    }

    public function actionItem($id)
    {

        if ($id) {
            $newsItem = News::getItem($id);
            print_r($newsItem);
        }
        return true;
    }

}
