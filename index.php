<?php
//require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/components/config.php');
require_once(__DIR__ . '/components/db.php');
require_once(__DIR__ . '/components/view.php');
require_once(__DIR__ . '/components/router.php');
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
session_start();
//корень к сайту
define('ROOT', dirname(__FILE__));

$router = new \App\Router();
$router->run();
