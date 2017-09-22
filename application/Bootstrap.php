<?php
/**
 * @name Bootstrap
 * @author suruixiang
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */

class Bootstrap extends Yaf\Bootstrap_Abstract
{

	/**
	 * 设置时区
	 */
	public function _initTime()
	{
		date_default_timezone_set('Asia/Shanghai');
	}

	/**
	 * composer自动加载
	 */
	public function _initAutoload()
	{
		Yaf\Loader::import(APPLICATION_PATH . '/vendor/autoload.php');
	}

	public function _initError()
	{
		/*Yaf\Dispatcher::getInstance()->setErrorHandler(function($errno, $errstr, $errfile, $errline){echo 33;
			header('Content-Type:application/json; charset=utf-8');
			echo json_encode(array(
					'code' => $errno,
					'message' => $errstr
			));
			die;
		});*/
		register_shutdown_function(function(){
			$e = error_get_last();
			switch($e['type']){
				case E_ERROR:
				case E_PARSE:
				case E_CORE_ERROR:
				case E_COMPILE_ERROR:
				case E_USER_ERROR:
					if (IS_POST) {
						header('Content-Type:application/json; charset=utf-8');
						if (DEBUG) {
							$error = json_encode(array(
									'code' => $e['type'],
									'message' => $e['message']
							));
						} else {
							$error = json_encode(array(
									'code' => 0,
									'message' => Yaf\Application::app()->getConfig()->error->message
							));
						}
					} else {
						if (DEBUG) {
							$error = <<<EOF
	<h2>ERROR:</h2>
		code:{$e['type']}<br>
		message:{$e['message']}<br>
		file:{$e['file']}<br>
		line:{$e['line']}
EOF;

						} else {
							$error = 'ERROR:' . Yaf\Application::app()->getConfig()->error->message;
						}
					}
					echo $error;
					\Core\Log::write($error, 'error_'.date('Y-m-d'));
					break;
			}
		});
	}

	/**
	 * 配置
	 */
    public function _initConfig()
	{
		/*$arrConfig = Yaf\Application::app()->getConfig();
		Yaf\Registry::set('config', $arrConfig);*/
		Yaf\Dispatcher::getInstance()->autoRender(false);  // 关闭自动加载模板
	}

	/**
	 * 开启session
	 */
	public function _initSession()
	{
		Yaf\Session::getInstance()->start();
	}

	/**
	 * 注册view控制器
	 * @param \Yaf\Dispatcher $dispatcher
	 */
	public function _initView(Yaf\Dispatcher $dispatcher)
	{
		$application_url = Yaf\Application::app()->getConfig()->application->directory;
		$blade = new Core\BladeAdapter($application_url);
		$dispatcher->setView($blade);
	}

	/**
	 * 加载自定义函数库
	 */
	/*public function _initFunction()
	{
		$application_url = Yaf\Application::app()->getConfig()->application->directory;
		Yaf\Loader::import("$application_url/common/functions.php");
	}*/

	/**
	 * filp/whoops错误异常处理
	 */
	/*public function _initException()
	{
		$whoops = new \Whoops\Run;
		$whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler);
		$whoops->register();
	}*/
}
