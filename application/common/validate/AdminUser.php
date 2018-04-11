<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/11
 * Time: 14:08
 */
namespace app\common\validate;

use think\Validate;

class AdminUser extends Validate
{
    protected $rule = [
        'username' => 'require|max:20',
        'password' => 'require|max:20'
    ];
}