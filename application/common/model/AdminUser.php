<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/11
 * Time: 14:16
 */

namespace app\common\model;

use think\Model;

class AdminUser extends Model
{
    protected $autoWriteTimestamp = true;
    /**
     * 新增
     * @param $data
     * @return mixed
     */
    public function add($data)
    {
        if (!is_array($data)) {
            exception('数据不合法');
        }
        $this->allowField(true)->save($data);

        return $this->id;
    }
}