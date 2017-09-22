<?php
/**
 * @name 系统相关
 * @author suruixiang
 */
class SystemController extends CommonController
{
    public function userAction()
    {
        $page = new \Core\Page(100);
        $show = $page->show();

        $this->assign('page', $show);
        $this->assign('module_name', '系统管理');
        $this->assign('operation_name', '系统用户管理');
        $this->display('system/user');
    }
}