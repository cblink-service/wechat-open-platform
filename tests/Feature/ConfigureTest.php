<?php
namespace Cblink\Service\Wechat\OpenPlatform\Tests\Feature;

use Cblink\Service\Wechat\OpenPlatform\Tests\TestCase;
use Illuminate\Support\Str;

/**
 * Class ConfigureTest
 * @package Cblink\Service\Tests\Auth
 */
class ConfigureTest extends TestCase
{
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

        $res = $this->getApplication()
            ->configure
            ->bind($payload);

        $this->assertTrue($res->success(), $res->errMsg());
    }

    /**
     * 保存url
     */
    public function testHookUrl()
    {
        $res = $this->getApplication()
            ->configure
            ->storeUrls([
                /** @see EasyWeChat\OpenPlatform\Server\Guard **/
                'event' => 'component_verify_ticket',
                'url' => [
                    'http://localhost',
                    'http://localhost:8080'
                ]
            ]);

        $this->assertTrue($res->success(), $res->errMsg());
    }

    /**
     * 获取所有的url
     */
    public function testUrls()
    {
        $res = $this->getApplication()
            ->configure
            ->getUrls();

        $this->assertTrue($res->success(), $res->errMsg());
    }

    /**
     * 获取特定事件配置的url
     */
    public function testUrlByEvent()
    {
        $res = $this->getApplication()
            ->configure
            ->getUrlsByEvent('component_verify_tickets');

        $this->assertTrue($res->success(), $res->errMsg());
    }
}
