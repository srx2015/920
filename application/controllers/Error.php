<?php
/**
 * @name ErrorController
 * @desc 错误控制器, 在发生未捕获的异常时刻被调用
 * @see http://www.php.net/manual/en/yaf-dispatcher.catchexception.php
 * @author suruixiang
 */
class ErrorController extends CommonController
{

	public function errorAction($exception)
	{
		$code = $exception->getMessage();
		if (!empty(ErrorCode::$message[$code])) {
			$message = ErrorCode::$message[$code];
		} else {
			$message = DEBUG ? $exception->getMessage() : Yaf\Application::app()->getConfig()->error->message;
		}
		if ($this->getRequest()->isPost()) {
            $this->ajaxReturn(array(
                'code' => $code,
                'message' => $message
            ));
			return false;
		}
		$this->getView()->assign('code', $code);
		$this->getView()->assign('message', $message);
		$this->getView()->display('error/error');
	}
}
