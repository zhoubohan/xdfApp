<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/11
 * Time: 14:34
 */

namespace app\admin\controller;

use app\common\lib\IAuth;
use think\Controller;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }


    /**
     *
     */
    public function check()
    {
        if (request()->isPost()) {
            $data = input('post.');
            if (!captcha_check($data['code'])) {
            	$this->error('验证码不正确');
            }
            //validate
            $validate = validate('AdminUser');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            //username  username+password
            try {
                $user = model('AdminUser')->get(['username' => $data['username']]);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }

            //1先校验用户是否存在
            if (!$user || $user->status != config('code.status_normal')) {
                $this->error('该用户不存在');
            }
            //2校验密码
            if (IAuth::setPassword($data['password']) != $user['password']) {
                $this->error('密码不正确');
            }

            //1.更新数据库 登录时间 登陆ip
            $udata = [
                'last_login_time' => time(),
                'last_login_ip' => request()->ip(),
            ];

            try {
                model('AdminUser')->save($udata, ['id' => $user->id]);
            }catch (\Exception $e) {
                $this->error($e->getMessage());
            }

            //2.用户信息保存session
            session(config('admin.session_user'), $user, config('admin.session_user_scope'));
            $this->success('登陆成功', 'index/index');

        } else {
        	$this->error('请求不合法');
        }

    }


    /**
     *退出登陆
     * 1.清空session
     * 2.回到登陆页面
     */
    public function logout()
    {
        session(null, config('admin.session_user_scope'));
        $this->redirect('login/index');
    }
}
