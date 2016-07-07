<?php

namespace Newband\Amplitude\Client;

use GuzzleHttp\Client;
use Newband\Amplitude\Message\Message;

/**
 * Class AmplitudeClient
 * @package Newband\Amplitude\Client
 * @author Zafar <zafar@newband.com>
 */
abstract class AmplitudeClient implements AmplitudeClientInterface
{
    /**
     * @var string
     */
    protected $apiKey = '';

    /**
     * @var string
     */
    protected $url;

    /**
     * @var null|\GuzzleHttp\Client
     */
    protected $client = null;

    /**
     * AmplitudeClient constructor.
     * @param null|string $apiKey
     */
    public function __construct($apiKey = null)
    {
        if (null != $apiKey) {
            $this->setApiKey($apiKey);
        }
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return \GuzzleHttp\Client|null
     */
    protected function getClient()
    {
        if (null === $this->client) {
            $this->client = new Client();
        }

        return $this->client;
    }

    /**
     * {@inheritdoc}
     */
    public function send(Message $message)
    {
        return $this->getClient()->request('POST', $this->url, array(
            'form_params' => $this->getPostBody($message)
        ));
    }
}