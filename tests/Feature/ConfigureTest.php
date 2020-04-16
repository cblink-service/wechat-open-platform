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
            ->create($payload);

        $this->assertTrue($res->success(), $res->errMsg());
    }

    /**
     * 保存url
     */
    public function testStoreUrl()
    {
        $res = $this->getApplication()
            ->configure
            ->storeUrl([
                'event' => 'server',
                'url' => 'http://localhost:8080'
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
            ->getUrl();

        $this->assertTrue($res->success(), $res->errMsg());
    }
}
