<?php
/**
 * 日志记录
 * User: suruixiang
 * Date: 2017/8/3
 * Time: 上午10:49
 * See: https://github.com/Seldaek/monolog
 */
namespace Core;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{
    private static $log;
    private static $file_name;
    private static function init()
    {
        if (!self::$log) {
            self::$log = new Logger('default');
        }
    }
    private static function createFile($file_name = '')
    {
        return empty($file_name) ? 'log_' . date('Y-m-d', time()) : $file_name;
    }
    private static function changeFileDir($file_name = '')
    {
        $file_name = self::createFile($file_name);
        if ($file_name != self::$file_name) {
            self::$log = new Logger('default');
            self::$file_name = $file_name;
            $log_dir = \Yaf\Application::app()->getConfig()->application->directory . '/log/';
            if (!is_dir($log_dir)) mkdir($log_dir);
            $file_name = $log_dir . $file_name . '.log';
            self::$log->pushHandler(new StreamHandler($file_name, Logger::DEBUG));
        }
    }
    public static function write($message, $file_name = '')
    {
        self::init();
        self::changeFileDir($file_name);
        self::$log->addInfo($message);
    }
    public function __callStatic($name, $arguments)
    {
        self::init();
        return call_user_func_array(array(self::$log, $name), $arguments);
    }

}