<?php
/**
 * @name 登录
 * @author suruixiang
 */
class LoginController extends CommonController
{

	public function indexAction()
	{
		//Yaf\Session::getInstance()->del('uid');
		if ($this->getRequest()->isPost()) {
			$post = $this->getRequest()->getPost();
			$params['user_name'] = filterString($post['username']);
			$params['password'] = $post['password'];
			if (!$params['user_name']) {
				$this->ajaxReturn([
						'code' => 0,
						'msg'  => '请输入用户名'
				]);
			}
			if (!$params['password']) {
				$this->ajaxReturn([
						'code' => 0,
						'msg'  => '请输入密码'
				]);
			}

			$login = new LoginModel();
			$return = $login->doLogin($params);
			if ($return['status'] == 0) {
				$this->ajaxReturn([
						'code' => 0,
						'msg'  => $return['message']
				]);
			} else {
				$this->ajaxReturn([
						'code' => 1,
						'msg'  => '登陆成功'
				]);
			}
			return false;
		}
		$this->display('login/index');
	}

	public function verifyAction()
	{
		$verify = new Verify();
		$verify->length = 4;
		$verify->entry();
		return false;
	}

	public function loginOutAction()
	{
		Yaf\Session::getInstance()->del('admin_user_id');
		Yaf\Session::getInstance()->del('admin_user_name');
		Yaf\Session::getInstance()->del('admin_user_head_img');
		$this->ajaxReturn([
				'code' => 1,
				'msg'  => '登出成功'
		]);
	}
}
