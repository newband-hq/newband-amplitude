<?php

namespace Newband\Amplitude\Tests;

use Newband\Amplitude\Client\EventClient;
use Newband\Amplitude\Message\Event;
use Newband\Amplitude\Message\Identity;

/**
 * Class EventClientTest
 * @package Newband\Amplitude\Tests
 * @author Zafar <zafar@newband.com>
 */
class EventClientTest extends \PHPUnit_Framework_TestCase
{
    public function testSend()
    {
        $identity = new Identity();
        $identity->setUserId(123456);

        $event = new Event();
        $event->setIdentity($identity);
        $event->setEventType('test_event');

        $eventClient = new EventClient($GLOBALS['apiKey']);
        $response = $eventClient->send($event);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('success', $response->getBody(true));
    }
}