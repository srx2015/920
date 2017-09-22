<?php
/**
 * Created by PhpStorm.
 * User: suruixiang
 * Date: 2017/2/26
 * Time: 下午6:14
 */
class ErrorCode
{

    const PARAME_ERROE   = 201;
    const CONTROLLER_NOEXIST = 516;
    const ACTION_NOEXIST = 517;
    const TMP_NOEXIST = 518;

    //登录相关
    const LOGIN_USERNAME_EMPTY = 301;
    const LOGIN_PASSWORD_EMPTY = 302;
    const LOGIN_CODE_EMPTY     = 303;
    const LOGIN_USERNAME_ERROR = 304;
    const LOGIN_CODE_ERROR     = 305;
    const LOGIN_MAX_TIME       = 306;

    //项目相关
    const ITEM_EMPTY           = 401;
    const PASSWORD_COUNT       = 402;
    const ITEM_CREATE          = 403;
    const ITEM_NOEXIST         = 404;

    //文章相关
    const ARTICLE_TITLE_EMPTY  = 501;
    const ARTICLE_CREATE       = 502;
    const ARTICLE_NOEXIST      = 503;

    //目录相关
    const CATALOG_NOEXIST      = 601;
    const CATALOG_CREATE       = 602;
    const CATALOG_NOAUTH       = 603;
    const CATALOG_DELETE       = 604;

    public static $message = array(
        self::PARAME_ERROE => '参数错误',
        self::CONTROLLER_NOEXIST => '啊哦，你所访问的页面不存在了，可能是炸了',
        self::ACTION_NOEXIST => '啊哦，你所访问的页面不存在了，可能是炸了',
        self::TMP_NOEXIST  => '啊哦，模板不存在了，可能是炸了',

        //登录相关
        self::LOGIN_USERNAME_EMPTY => '用户名不能为空',
        self::LOGIN_PASSWORD_EMPTY => '密码不能为空',
        self::LOGIN_CODE_EMPTY     => '验证码不能为空',
        self::LOGIN_USERNAME_ERROR => '用户名或密码错误',
        self::LOGIN_CODE_ERROR     => '验证码错误',
        self::LOGIN_MAX_TIME       => '密码输入次数过多,请一小时后再重试',

        //项目相关
        self::ITEM_EMPTY           => '项目名不能为空',
        self::PASSWORD_COUNT       => '访问密码不能小于6位',
        self::ITEM_CREATE          => '项目添加失败,请稍后重试',
        self::ITEM_NOEXIST         => '项目不存在',

        //文章相关
        self::ARTICLE_TITLE_EMPTY  => '标题不能为空',
        self::ARTICLE_CREATE       => '添加失败,请稍后重试',
        self::ARTICLE_NOEXIST      => '文章不存在',

        //目录相关
        self::CATALOG_NOEXIST      => '目录不存在',
        self::CATALOG_CREATE       => '添加失败,请稍后重试',
        self::CATALOG_NOAUTH       => '没有权限操作',
        self::CATALOG_DELETE       => '目录删除失败,请稍后重试',
    );
}