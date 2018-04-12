<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/11
 * Time: 16:50
 */

namespace app\admin\controller;

use think\Controller;


/**
 * 后台基础类库
 * Class Base
 * @package app\admin\controller
 */
class Base extends Controller
{
    /**
     *初始化方法
     */
    public function _initialize()
    {
        $isLogin = $this->isLogin();
        if (!$isLogin) {
            return $this->redirect('login/index');
        }
    }

    public function isLogin()
    {
        //获取session
        $user = session(config('admin.session_user'), '', config('admin.session_user_scope'));
        if ($user && $user->id) {
            return true;
        }

        return false;
    }
}