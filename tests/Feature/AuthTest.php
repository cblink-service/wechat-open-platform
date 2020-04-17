<?php
namespace Cblink\Service\Wechat\OpenPlatform\Tests\Feature;

use Cblink\Service\Wechat\OpenPlatform\Tests\TestCase;

/**
 * Class WorkTest
 * @package Cblink\Service\Tests\Work
 */
class AuthTest extends TestCase
{

    public function testGetTicket()
    {
        $res = $this->getApplication()
            ->auth
            ->getTicket();

        var_dump($res->all());

        $this->assertTrue($res->success());
    }

    public function testGetAuthUrl()
    {
        $res = $this->getApplication()
            ->auth
            ->getAuthUrl([
                'auth_type' => 3,
                'type' => 'scan',
                'url' => 'http://localhost'
            ]);

        var_dump($res->all());

        $this->assertTrue($res->success());
    }


    public function testBindAppId()
    {
        $res = $this->getApplication()
            ->auth->bindAppId('test123456');

        var_dump($res->all());

        $this->assertTrue($res->success());
    }
}
