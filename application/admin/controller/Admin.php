<?php
namespace app\admin\controller;

use think\Controller;
use think\Exception;

class Admin extends Controller
{
    public function add()
    {
        //判断是否是post提交
        if (request()->isPost()) {
            //halt(input('post.'));
            $data = input('post.');
            //validate
            $validate = validate('AdminUser');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $data['password'] = md5($data['password'].'_#irene');
            $data['status'] = 1;

            try {
                $id = model('AdminUser')->add($data);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }

            if ($id) {
                $this->success('id = '.$id.'的用户创建成功');
            }else {
                $this->error('error');
            }


        } else {
            return $this->fetch();
        }

    }
}
