<?php

namespace Newband\Amplitude\Tests;

use Newband\Amplitude\Message\Identity;

class IdentityTest extends \PHPUnit_Framework_TestCase
{
    public function testFormat()
    {
        $identity = new Identity();
        $identity->setUserId(1);
        $identity->setDeviceId(1);
        $data = json_decode($identity->format(), true);
        $this->assertArrayHasKey('user_id', $data);
        $this->assertEquals("1", $data['user_id']);
    }
}