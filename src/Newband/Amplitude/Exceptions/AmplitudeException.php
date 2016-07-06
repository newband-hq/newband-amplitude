<?php

namespace Newband\Amplitude\Exceptions;

/**
 * Class AmplitudeException
 * @package Newband\Amplitude\Exceptions
 * @author Zafar <zafar@newband.com>
 */
class AmplitudeException extends \Exception
{
    /**
     * @var int
     */
    protected $code = 500;

    /**
     * @var string
     */
    protected $message = "Amplitude Error";
}