<?php

/**
 * Class LoginModel
 * 登录相关
 */
class LoginModel
{
    /**
     * 登录
     * @param array $params
     */
    public function doLogin(array $params)
    {
        $return = [
            'status'  => 1,
            'message' => ''
        ];
        $update = [];
        $admin = new Dao\AdminModel();
        $admin_data = $admin->getDataByName($params['user_name']);
        //检测用户名、密码
        if (!$admin_data || !$this->checkPassword($admin_data['password'], $params['password'])) {
            $return['status'] = 0;
            $return['message'] = '用户名或密码错误';
        } elseif ($admin_data['status'] == 2) {
            $return['status'] = 0;
            $return['message'] = '该用户已被冻结';
        }
        $update['last_time'] = date('Y-m-d H:i:s', time());
        $update['last_ip']   = getIPaddress();
        $this->updatePassword($admin_data['password'], $update);
        $admin->saveUserData($admin_data['id'], $update);

        Yaf\Session::getInstance()->set('admin_user_id', $admin_data['id']);
        Yaf\Session::getInstance()->set('admin_user_name', $admin_data['user_name']);
        Yaf\Session::getInstance()->set('admin_user_head_img', $admin_data['head_img']);
        return $return;
    }

    /**
     * 检测用户密码
     * @param $user_pwd
     * @param $sub_pwd
     * @return bool
     */
    private function checkPassword($user_pwd, $sub_pwd)
    {
        return password_verify($sub_pwd, $user_pwd);
    }

    /**
     * 是否重新计算密码哈希值
     * @param $user_pwd 用户密码
     * @param $update   要修改的数据
     */
    private function updatePassword($user_pwd, &$update)
    {
        $password_algo = PASSWORD_DEFAULT;          //密码算法常量
        if (password_needs_rehash(
                $user_pwd,
                $password_algo
            ) === true) {
            $update['password'] = password_hash(
                $user_pwd,
                $password_algo
            );
        }
    }

    /**
     * 生成新哈希密码
     * @param $pwd
     * @return string
     */
    private function createPassword($pwd)
    {
        $password_algo = PASSWORD_DEFAULT;          //密码算法常量
        return password_hash(
            $pwd,
            $password_algo
        );
    }
}