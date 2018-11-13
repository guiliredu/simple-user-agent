<?php

use PHPUnit\Framework\TestCase;
use SimpleUserAgent\UserAgent;

class UserAgentTest extends TestCase
{
    protected $agent;

    public function setUp()
    {
        $this->agent = new UserAgent();
    }

    public function testCanFindUserAgent()
    {
        $this->agent->setAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 11_1_1 like Mac OS X) AppleWebKit/604.3.5 (KHTML, like Gecko) Version/11.0 Mobile/15B150 Safari/604.1');
        $this->assertEquals('iPhone', $this->agent->getPlatform());
        $this->assertEquals('Apple Safari', $this->agent->getBrowser());
        $this->assertEquals('Safari', $this->agent->getPrefix());
        $this->assertEquals('11.0', $this->agent->getVersion());
    }
}
