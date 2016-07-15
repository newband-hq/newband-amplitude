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
     * @param null|string $apiKey
     * @param array $config
     */
    public function __construct($apiKey = null, $config = array())
    {
        parent::__construct($apiKey, $config);
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