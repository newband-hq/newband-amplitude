<?php

namespace Newband\Amplitude\Client;

use Newband\Amplitude\Message\Message;

/**
 * Class IdentityClient
 * @package Newband\Amplitude
 * @author Zafar <zafar@newband.com>
 */
class IdentityClient extends AmplitudeClient
{
    /**
     * @var string
     */
    const AMPLITUDE_IDENTITY_URL = 'https://api.amplitude.com/identify';

    /**
     * EventClient constructor.
     * @param null $apiKey
     */
    public function __construct($apiKey = null)
    {
        parent::__construct($apiKey);
        $this->setUrl(self::AMPLITUDE_IDENTITY_URL);
    }

    /**
     * {@inheritdoc}
     */
    public function getPostBody(Message $message)
    {
        return array(
            'api_key' => $this->apiKey,
            'identification' => $message->format()
        );
    }
}