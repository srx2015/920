<?php
/**
 * @name 首页
 * @author suruixiang
 * @desc 默认控制器
 */
class IndexController extends CommonController
{

	public function indexAction()
	{
		$this->assign('module_name', 'Home');
		$this->assign('operation_name', '首页');
		$this->display('index/index');
	}
}
