<?php

namespace Cblink\Service\Wechat\OpenPlatform\Auth;

use Cblink\Service\Kennel\AbstractApi;

/**
 * Class Client
 * @package Cblink\Service\Wechat\Work
 */
class Client extends AbstractApi
{
    /**
     * 获取授权url
     *
     * @param array $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function getAuthUrl(array $payload = [])
    {
        return $this->get('api/open/auth/url', array_merge([
            'uuid' => $this->app->getUuid(),
            'auth_type' => 1
        ], $payload));
    }

    /**
     * 绑定公众号到应用
     *
     * @param $appId
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function bindAppId($appId)
    {
        return $this->post('api/open/auth/bind', [
            'uuid' => $this->app->getUuid(),
            'app_id' => $appId
        ]);
    }

    /**
     * 获取ticket
     *
     * @param array $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function getTicket(array $payload = [])
    {
        return $this->get("api/open/auth/{$this->app->getUuid()}/ticket", $payload);
    }

    /**
     * 获取access token
     *
     * @param array $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function getAccessToken(array $payload = [])
    {
        return $this->get("api/open/auth/{$this->app->getUuid()}/ticket", $payload);
    }
}
