<?php
namespace Cblink\Service\Wechat\OpenPlatform\Tests\Feature;

use Cblink\Service\Wechat\OpenPlatform\Tests\TestCase;

/**
 * Class WorkTest
 * @package Cblink\Service\Tests\Work
 */
class AuthTest extends TestCase
{

    public function testGetAuthUrl()
    {
        $res = $this->getApplication()
            ->auth
            ->getAuthUrl([
                'auth_type' => 3,
                'type' => 'scan',
                'url' => 'http://localhost'
            ]);

        var_dump($res->origin());

        $this->assertTrue($res->success());
    }
}
