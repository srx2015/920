<?php
/**
 * 视图引擎定义
 * User: suruixiang
 * Date: 2017/7/14
 * Time: 下午3:06
 */
namespace Core;

use duncan3dc\Laravel\BladeInstance;

class BladeAdapter implements \Yaf\View_Interface
{
    private $blade;
    private $tel_data = array();

    public function __construct($tmplPath)
    {
        $this->blade = new BladeInstance($tmplPath . '/views', $tmplPath . '/views_cache');
    }

    public function assign($name, $value = null) {
        $this->tel_data[$name] = $value;
    }

    public function display($tpl = 'index/index', $tpl_vars = null)
    {
        echo $this->blade->render($tpl, $this->tel_data);
    }

    public function getScriptPath()
    {

    }

    public function render($tel_dir, $tpl_vars = null)
    {

    }

    public function setScriptPath($template_dir)
    {

    }
}