<?php

namespace app\admin\api\controller;

use think\Controller;

class Test extends Controller
{
    public function save()
    {
        $data = input('post.');
        if ($data['mt'] != 1) {
            exception('您提交的数据不合法', 400);
        }

        return show(1, 'ok', input('post.'), 201);
    }
}
