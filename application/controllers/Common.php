<?php
/**
 * @name CommonController
 * @author suruixiang
 * @desc 公共控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */

class CommonController extends Yaf\Controller_Abstract
{
	public function init()
	{
        define('MODULENAME', $this->getRequest()->getModuleName());
        define('CONTROLLERNAME', $this->getRequest()->getControllerName());
        define('ACTIONNAME', $this->getRequest()->getActionName());
        $uid = Yaf\Session::getInstance()->get('admin_user_id');
        if ($this->getRequest()->isGet()) {
            if (!in_array(CONTROLLERNAME, ['Login']) && !$uid) {
                //$this->forward('Index', 'Login', 'index');
                header('Location: /login/index');
            }
            $this->getView()->assign('controller_name', CONTROLLERNAME);
            $this->getView()->assign('action_name', ACTIONNAME);

        } else {
            if (!$uid) {
                $this->ajaxReturn([
                    'code' => 0,
                    'msg'  => '请重新登录'
                ]);
            }
        }
	}

    /*
     * 输出json
     * @param  [arrray] $data
     * */
    public function ajaxReturn($data)
    {
        header('Content-Type:application/json; charset=utf-8');
        $this->getResponse()->setBody(json_encode($data));
    }

    /**
     * 映射变量
     * @param $key
     * @param $value
     */
    public function assign($key, $value)
    {
        $this->getView()->assign($key, $value);
    }

    /**
     * 映射模板
     * @param string $tpl
     */
    public function display($tpl)
    {
        $this->getView()->display($tpl);
    }
}
