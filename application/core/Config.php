<?php
/**
 * 获取配置
 * User: suruixiang
 * Date: 2017/8/25
 * Time: 上午10:34
 */
namespace Core;

class Config
{
    /**
     * @param $config
     * @param string $classify
     * @return string
     */
    public static function getConf($config, $classify = '')
    {
        return $classify ? \Yaf\Application::app()->getConfig()->$classify->$config : \Yaf\Application::app()->getConfig()->$config;
    }
}