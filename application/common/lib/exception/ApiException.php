<?php

namespace app\common\lib\exception;

use think\Exception;

class ApiException extends Exception
{
    public $message = '';
    public $httpCode = 0;
    public $code = 0;

    /**
     * 构造.
     *
     * @param string $message
     * @param int    $httpCode
     * @param int    $code
     */
    public function __construct($message = '', $httpCode = 0, $code = 0)
    {
        $this->message = $message;
        $this->httpCode = $httpCode;
        $this->code = $code;
    }
}
