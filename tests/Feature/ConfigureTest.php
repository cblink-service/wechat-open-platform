<?php
namespace Cblink\Service\Wechat\OpenPlatform\Tests\Feature;

use Cblink\Service\Wechat\OpenPlatform\Configure\Client;
use Cblink\Service\Wechat\OpenPlatform\Tests\TestCase;
use Cblink\Service\Wechat\OpenPlatform\Tests\Traits\GetPsrResponse;
use Illuminate\Support\Str;

/**
 * Class ConfigureTest
 * @package Cblink\Service\Tests\Auth
 */
class ConfigureTest extends TestCase
{
    use GetPsrResponse;

    /**
     * 账户绑定
     */
    public function testBind()
    {
        $payload = [
            'app_id' => 'test1234567890test',
            'secret' => 'test',
            'token' => 'test',
            'aes_key' => Str::random(43)
        ];

        $client = \Mockery::mock(Client::class, [$this->getApp()]);
        $client->allows()
            ->create($payload)
            ->andReturn($this->getHttpResponse([
                'uuid' => 'xxxxxxxxxxxxxxs'
            ]));

        $res = $this->rebindAppClient('configure', $client)
            ->configure
            ->create($payload);

        $this->assertTrue($res->success(), $res->errMsg());
    }

    /**
     * 保存url
     */
    public function testStoreUrl()
    {
        $payload = [
            'event' => 'server',
            'url' => 'http://localhost:8080'
        ];

        $client = \Mockery::mock(Client::class, [$this->getApp()]);
        $client->allows()
            ->storeUrl($payload)
            ->andReturn($this->getHttpResponse());

        $res = $this->rebindAppClient('configure', $client)
            ->configure
            ->storeUrl($payload);

        $this->assertTrue($res->success(), $res->errMsg());
    }

    /**
     * 获取所有的url
     */
    public function testUrls()
    {
        $client = \Mockery::mock(Client::class, [$this->getApp()]);
        $client->allows()
            ->getUrl()
            ->andReturn($this->getHttpResponse());

        $res = $this->rebindAppClient('configure', $client)
            ->configure
            ->getUrl();

        $this->assertTrue($res->success(), $res->errMsg());
    }
}
