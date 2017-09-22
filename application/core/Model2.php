<?php
/**
 * Model基类
 * User: suruixiang
 * Date: 2017/7/15
 * Time: 上午11:29
 * See: http://medoo.lvtao.net/doc.php
 */
namespace Core;

use Medoo\Medoo;

class Model2
{
    private $medoo;
    public $pdo;
    private $methods = [
        'action', 'query', 'quote', 'debug', 'error', 'log', 'last_query', 'info'
    ];
    public function __construct()
    {
        if (!$this->medoo) {
            $this->medoo = new Medoo([
                // 必须配置项
                'database_type' => 'mysql',
                'database_name' => \Yaf\Application::app()->getConfig()->db->name,
                'server'   => \Yaf\Application::app()->getConfig()->db->host,
                'username' => \Yaf\Application::app()->getConfig()->db->user,
                'password' => \Yaf\Application::app()->getConfig()->db->pwd,
                'charset'  => 'utf8mb4',

                // 可选参数
                'port' => 3306,

                // 可选，定义表的前缀
                'prefix' => \Yaf\Application::app()->getConfig()->db->prefix,

                // 连接参数扩展, 更多参考 http://www.php.net/manual/en/pdo.setattribute.php
                'option' => [
                    \PDO::ATTR_CASE => \PDO::CASE_NATURAL
                ]
            ]);
            $this->pdo = $this->medoo->pdo;
            $this->table = \Yaf\Application::app()->getConfig()->db->prefix . $this->table;
        }
    }
    public function __call($name, $arguments)
    {
        if (!in_array($name, $this->methods) && !empty($arguments))
            array_unshift($arguments, $this->table);
        return $arguments ? call_user_func_array(array($this->medoo, $name), $arguments) : $this->medoo->$name();
    }
}