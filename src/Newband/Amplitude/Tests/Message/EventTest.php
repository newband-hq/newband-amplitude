<?php

namespace Newband\Amplitude\Tests;

use Newband\Amplitude\Message\Event;
use Newband\Amplitude\Message\Identity;

/**
 * Class EventTest
 * @package Newband\Amplitude\Tests
 * @author Zafar <zafar@newband.com>
 */
class EventTest extends \PHPUnit_Framework_TestCase
{
    public function testFormat()
    {
        $identity = new Identity();
        $identity->setUserId(1);
        $identity->setDeviceId(1);
        $event = new Event();
        $event->setIdentity($identity);

        $data = json_decode($event->format(), true);
        $this->assertArrayHasKey('user_id', $data);
        $this->assertArrayHasKey('device_id', $data);
        $this->assertEquals("1", $data['user_id']);
    }
}