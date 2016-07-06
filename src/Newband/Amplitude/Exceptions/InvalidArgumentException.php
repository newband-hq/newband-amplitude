<?php

namespace Newband\Amplitude\Exceptions;

/**
 * Class InvalidArgumentException
 * @package Newband\Amplitude\Exceptions
 * @author Zafar <zafar@newband.com>
 */
class InvalidArgumentException extends AmplitudeException
{
    /**
     * @var int
     */
    protected $code = 501;

    /**
     * @var string
     */
    protected $message = "Invalid identifier.";
}