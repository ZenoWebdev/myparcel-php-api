<?php

namespace Mvdnbrk\MyParcel\Exceptions;

class MyParcelException extends \Exception
{
    /**
     * @param  string  $message
     * @param  int  $code
     */
    public function __construct($message = '', $code = 0)
    {
        parent::__construct($message, $code);
    }
}
