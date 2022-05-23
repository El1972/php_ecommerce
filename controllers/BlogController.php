<?php

class BlogController
{

    public function actionIndex()
    {

        require_once ROOT . '/views/blog/view.php';

        return true;
    }

    public function actionBlog($id)
    {

        require_once ROOT . '/views/blog/view.php';

        return true;
    }

}
