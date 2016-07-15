<?php

namespace Newband\Amplitude\Client;

use Newband\Amplitude\Message\Message;

/**
 * Class EventClient
 * @package Newband\Amplitude\Client
 * @author Zafar <zafar@newband.com>
 */
class EventClient extends AmplitudeClient
{
    /**
     * @var string
     */
    const AMPLITUDE_EVENT_URL = 'https://api.amplitude.com/httpapi';

    /**
     * EventClient constructor.
     * @param null|string $apiKey
     * @param array $config
     */
    public function __construct($apiKey = null, $config = array())
    {
        parent::__construct($apiKey, $config);
        $this->setUrl(self::AMPLITUDE_EVENT_URL);
    }

    /**
     * {@inheritdoc}
     */
    public function getPostBody(Message $message)
    {
        return array(
            'api_key' => $this->apiKey,
            'event' => $message->format()
        );
    }
}