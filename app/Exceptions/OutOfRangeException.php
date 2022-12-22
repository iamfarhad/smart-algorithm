<?php

namespace App\Exceptions;

use Exception;

class OutOfRangeException extends Exception
{
    protected $message = 'The number is out of range';
}
