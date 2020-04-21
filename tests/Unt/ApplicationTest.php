<?php
namespace Cblink\Service\Wechat\OpenPlatform\Tests\Unit;

use Cblink\Service\Wechat\OpenPlatform\Tests\TestCase;

/**
 * Class ProtectedTest
 * @package Cblink\Service\Wechat\OpenPlatform\Tests\Unit
 */
class ApplicationTest extends TestCase
{
    public function testAuth()
    {
        $this->assertInstanceOf(\Cblink\Service\Wechat\OpenPlatform\Auth\Client::class, $this->getApp()->auth);
    }

    public function testConfigure()
    {
        $this->assertInstanceOf(\Cblink\Service\Wechat\OpenPlatform\Configure\Client::class, $this->getApp()->configure);
    }
}
