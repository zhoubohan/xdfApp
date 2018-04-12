<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/11
 * Time: 15:15
 */

namespace app\common\lib;


class IAuth
{
    /**
     * 设置密码
     * @param $data
     * @return string
     */
    public static function setPassword($data)
    {
        return md5($data.config('app.password_pre_halt'));
    }
}