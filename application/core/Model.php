<?php
/**
 * Model基类
 * User: suruixiang
 * Date: 2016/5/11
 * Time: 下午10:43
 */
namespace Core;

use Yaf\Exception;

class Model
{
    private $tablepre;			//前缀
    protected $table;			//表名
    protected static $link;
    private $data;
    private $where;				//条件
    private $field;				//字段
    private $order;				//排序
    private $limit;				//限量
    private $join;				//join
    private $sql;
    public function __construct()
    {
        $this->tablepre = Config::getConf('prefix', 'db');
        $this->table    = $this->tablepre . $this->table;
        $this->data     = array();
        $this->connect();
    }
    private function connect()
    {
        if(!self::$link) {
            try{
                $dsn = sprintf('mysql:local=%s;dbname=%s', Config::getConf('host', 'db'), Config::getConf('name', 'db'));
                self::$link = new \PDO($dsn, Config::getConf('user', 'db'), Config::getConf('pwd', 'db'));
                self::$link->exec('set names utf8mb4');
            }catch (Exception $e){
                //抛出异常
            }
        }
        return self::$link;
    }
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    //条件
    public function where()
    {
        $numargs  = func_num_args();					//参数数量
        if($numargs){
            $this->where = func_get_args();				//参数列表
            return $this;
        }else{
            throw new \Exception("错误条件类型");
        }
    }
    //字段
    public function field($field = '')
    {
        $this->field = $field;
        return $this;
    }
    //排序
    public function order($order = '')
    {
        $this->order = $order;
        return $this;
    }
    //限量
    public function limit($limit = '')
    {
        $this->limit = $limit;
        return $this;
    }
    //join
    public function join($join = '')
    {
        $join = trim($join);
        $this->join = $join;
        return $this;
    }
    //查询单条
    public function find()
    {
        $this->limit = 1;
        return $this->select()[0];
    }
    //查询
    public function select()
    {
        $list  = array();
        $where_num = count($this->where);				//条件数量
        if($where_num){
            $where = "WHERE {$this->where[0]}";
        }
        $field = $this->field ? $this->field : '*';					//字段
        $order = $this->order ? "ORDER BY {$this->order}" : '';		//排序
        $limit = $this->limit ? "LIMIT {$this->limit}" : '';	    //限量
        $join = $this->join ? $this->join : '';						//join
        $sql = "select $field from {$this->table} $join $where $order $limit";
        $this->sql = $sql;
        $sth = self::$link->prepare($sql);
        if($where_num > 1){
            unset($this->where[0]);
            foreach($this->where as $key => &$val){
                $sth->bindParam("$key", $val);			//绑定参数
                $this->sql = preg_replace('/\?/', $val, $this->sql, 1);
            }
        }
        $this->clear();
        $sth->execute();
        while ($row = $sth->fetch(constant("PDO::FETCH_ASSOC"))) {
            $list[] = $row;
        }
        return $list;
    }
    //添加
    public function add(array $data)
    {
        $va = '';
        $sql = 'INSERT INTO `'.$this->table.'` (';
        foreach($data as $key => $val){
            $sql .= "$key,";
            $va  .= ":$key,";
        }
        $sql = rtrim($sql, ',') . ') VALUES (' . rtrim($va, ',') . ')';
        $this->sql = $sql;
        $sth = self::$link->prepare($sql);				//预处理
        foreach ($data as $key => &$val) {
            $sth->bindParam(':'.$key, $val);			//绑定参数
            $this->sql = str_replace(':'.$key, $val, $this->sql);
        }
        $this->clear();
        if ($sth->execute())
            return self::$link->lastInsertId();			//返回最后插入ID
        else
            return false;
    }
    //修改
    public function save(array $data)
    {
        $sql = 'UPDATE `'.$this->table.'` SET ';
        foreach($data as $key => $val){
            $sql .= "$key = ?,";
        }
        $where_num = count($this->where);				//条件数量
        if($where_num){
            $where = "WHERE {$this->where[0]}";
        }
        $sql = rtrim($sql, ',') . ' ' . $where;
        $this->sql = $sql;
        $sth = self::$link->prepare($sql);				//预处理
        $i = 1;
        foreach($data as $key => &$val){
            $sth->bindParam($i, $val);					//绑定参数
            $this->sql = preg_replace('/\?/', $val, $this->sql, 1);
            $i++;
        }
        if($where_num > 1){
            unset($this->where[0]);
            foreach($this->where as &$val){
                $sth->bindParam($i, $val);				//绑定条件参数
                $this->sql = preg_replace('/\?/', $val, $this->sql, 1);
                $i++;
            }
        }
        $this->clear();
        return $sth->execute();
    }
    //删除
    public function delete()
    {
        $sql = 'DELETE FROM `'.$this->table.'`';
        $where_num = count($this->where);				//条件数量
        if($where_num){
            $where = "WHERE {$this->where[0]}";
        }
        $sql .= $where;
        $this->sql = $sql;
        $sth = self::$link->prepare($sql);				//预处理
        if($where_num > 1){
            unset($this->where[0]);
            foreach($this->where as $key => &$val){
                $sth->bindParam("$key", $val);			//绑定参数
                $this->sql = preg_replace('/\?/', $val, $this->sql, 1);
            }
        }
        $this->clear();
        return $sth->execute();
    }
    //开启事务
    public function begin()
    {
        return self::$link->beginTransaction();
    }
    //事务提交
    public function commit()
    {
        return self::$link->commit();
    }
    //事务回滚
    public function rollback()
    {
        return self::$link->rollBack();
    }
    //获取执行sql
    public function last()
    {
        return $this->sql;
    }
    private function clear()
    {
        unset($this->data);
        unset($this->where);
        unset($this->field);
        unset($this->order);
        unset($this->limit);
        unset($this->join);
    }
}