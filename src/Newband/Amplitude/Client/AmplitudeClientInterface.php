<?php

namespace Newband\Amplitude\Client;

use Newband\Amplitude\Message\Message;

/**
 * Interface AmplitudeClientInterface
 * @package Newband\Amplitude\Client
 * @author Zafar <zafar@newband.com>
 */
interface AmplitudeClientInterface
{
    /**
     * @param \Newband\Amplitude\Message\Message $message
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function send(Message $message);

    /**
     * @param \Newband\Amplitude\Message\Message $message
     * @return array
     */
    public function getPostBody(Message $message);
}