<?php

use PHPUnit\Framework\TestCase;
use SimpleUserAgent\UserAgent;

class UserAgentTest extends TestCase
{
    protected $agent;

    public function setUp()
    {
        $this->agent = new UserAgent();
        $this->agent->setAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_1_1 like Mac OS X) AppleWebKit/604.3.5 (KHTML, like Gecko) Version/11.0 Mobile/15B150 Safari/604.1');
    }

    public function testCanFindUserAgent()
    {
        $this->assertEquals('Mozilla/5.0 (iPhone; CPU iPhone OS 11_1_1 like Mac OS X) AppleWebKit/604.3.5 (KHTML, like Gecko) Version/11.0 Mobile/15B150 Safari/604.1', $this->agent->getAgent());
    }

    public function testCanFindDevice()
    {
        $this->assertEquals('iPhone', $this->agent->getDevice());
    }

    public function testCanFindBroserName()
    {
        $this->assertEquals('Apple Safari', $this->agent->getBrowser());
    }

    public function testCanFindPrefix()
    {
        $this->assertEquals('Safari', $this->agent->getPrefix());
    }

    public function testCanFindVersion()
    {
        $this->assertEquals('11.0', $this->agent->getVersion());
    }
}
