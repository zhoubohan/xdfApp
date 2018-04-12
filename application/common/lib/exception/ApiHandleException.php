<?php

namespace app\common\lib\exception;

use think\exception\Handle;

class ApiHandleException extends Handle
{
    /**
     * http状态码
     *
     * @var int
     */
    public $httpCode = 500;

    public function render(\Exception $e)
    {
        return show(0, $e->getMessage(), [], $this->httpCode);
    }
}
