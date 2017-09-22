<?php
/**
 * 依赖:
 * duncan3dc/blade  - 模板引擎
 * catfan/Medoo     - 数据库操作框架
 */
header("Content-Type:text/html;charset=utf-8");
//ini_set('display_errors', 1);
error_reporting(0);

if (!extension_loaded('yaf')) {
    die('load yaf!');
} elseif (version_compare(PHP_VERSION,'5.4.0','<')) {
    die('require PHP > 5.4.0 !');
}


define('APPLICATION_PATH', dirname(__DIR__));
define('DEBUG', true);
define('REQUEST_METHOD',$_SERVER['REQUEST_METHOD']);
define('IS_GET', REQUEST_METHOD =='GET' ? true : false);
define('IS_POST', REQUEST_METHOD =='POST' ? true : false);
define('IS_PUT', REQUEST_METHOD =='PUT' ? true : false);
define('IS_DELETE', REQUEST_METHOD =='DELETE' ? true : false);
define('IS_AJAX', ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') || !empty($_POST['ajax']) || !empty($_GET['ajax'])) ? true : false);


$application = new Yaf\Application( APPLICATION_PATH . "/conf/application.ini");

$application->bootstrap()->run();
