<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once ROOT . '/main_router/Router.php';
require_once ROOT . '/components/Db.php';
include_once ROOT . '/models/News.php';

$router = new Router;
$router->run();
