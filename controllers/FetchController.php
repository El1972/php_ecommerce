<?php

include_once ROOT . '/models/Fetch.php';

class FetchController
{

    public function actionQuery()
    {

        $first = Fetch::first();

    }

    public function actionFetch()
    {

        $second = Fetch::second();

    }

    public function actionAll()
    {

        $third = Fetch::third();

    }

    public function actionColumn()
    {

        $fourth = Fetch::fourth();

    }

}
