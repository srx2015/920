<?php
/**
 * Created by PhpStorm.
 * User: suruixiang
 * Date: 2017/7/15
 * Time: 上午11:38
 */
namespace Dao;

class AdminModel extends \Core\Model
{
    protected $table = 'admin';

    /**
     * 根据用户名获取用户信息
     * @param $user_name
     * @return array
     */
    public function getDataByName($user_name)
    {
        return $this->where('user_name = ?', $user_name)->field('id, user_name, status, password, head_img')->find();
    }

    /**
     * 修改用户数据
     * @param $user_id
     * @param $new_user_dat
     * @return bool
     */
    public function saveUserData($user_id, $new_user_dat)
    {
        return $this->where('id = ?', $user_id)->save($new_user_dat);
    }
}