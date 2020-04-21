<?php
namespace Cblink\Service\Wechat\OpenPlatform\Tests\Feature;

use Cblink\Service\Kennel\HttpResponse;
use Cblink\Service\Wechat\OpenPlatform\Auth\Client;
use Cblink\Service\Wechat\OpenPlatform\Tests\TestCase;
use Cblink\Service\Wechat\OpenPlatform\Tests\Traits\GetPsrResponse;


/**
 * Class WorkTest
 * @package Cblink\Service\Tests\Work
 */
class AuthTest extends TestCase
{
    use GetPsrResponse;

    public function testGetTicket()
    {
        $client = \Mockery::mock(
            Client::class,
            [$this->getApp()]
        );
        $client->allows()
            ->getTicket()
            ->andReturn($this->getHttpResponse([
                'ticket' => 'testtesttestestetst'
            ]));

        $res = $this->rebindAppClient('auth',  $client)
            ->auth
            ->getTicket();

        $this->assertTrue($res->success());
    }

    public function testGetAuthUrl()
    {
        $payload = [
            'auth_type' => 3,
            'type' => 'scan',
            'url' => 'http://localhost'
        ];

        $client = \Mockery::mock(
            Client::class,
            [$this->getApp()]
        );
        $client->allows()
            ->getAuthUrl($payload)
            ->andReturn($this->getHttpResponse([
                'url' => 'http://www.baidu.com'
            ]));

        $res = $this->rebindAppClient('auth', $client)
            ->auth
            ->getAuthUrl($payload);

        $this->assertTrue($res->success());
    }


    public function testBindAppId()
    {
        $appId = 'test123456';

        $client = \Mockery::mock(
            Client::class,
            [$this->getApp()]
        );
        $client->allows()
            ->bindAppId($appId)
            ->andReturn($this->getHttpResponse());

        $res = $this->rebindAppClient('auth', $client)
            ->auth->bindAppId($appId);

        $this->assertTrue($res->success());
    }
}
