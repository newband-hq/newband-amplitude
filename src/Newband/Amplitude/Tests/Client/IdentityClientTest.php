<?php

namespace Newband\Amplitude\Tests;

use Newband\Amplitude\Client\IdentityClient;
use Newband\Amplitude\Message\Identity;

/**
 * Class IdentityClientTest
 * @package Newband\Amplitude\Tests
 * @author Zafar <zafar@newband.com>
 */
class IdentityClientTest extends \PHPUnit_Framework_TestCase
{
    public function testSend()
    {
        $identity = new Identity();
        $identity->setUserId(123456);

        $eventClient = new IdentityClient('f943f83314baab4f6fe4ad5a3f18fab9');
        $response = $eventClient->send($identity);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('success', $response->getBody(true));
    }
}