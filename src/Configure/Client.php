<?php

namespace Cblink\Service\Wechat\OpenPlatform\Configure;

use Cblink\Service\Kennel\AbstractApi;

/**
 * Class Client
 * @package Cblink\Service\Wechat\Config
 */
class Client extends AbstractApi
{
    /**
     * 绑定账号
     *
     * @param array $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function create(array $payload = [])
    {
        return $this->post('api/open/config', $payload);
    }

    /**
     * 修改账号配置信息
     *
     * @param array $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function update(array $payload = [])
    {
        return $this->put("api/open/config/{$this->app->getUuid()}", $payload);
    }

    /**
     * 保存配置的url
     *
     * @param array $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function storeUrl(array $payload = [])
    {
        return $this->post("api/open/config/{$this->app->getUuid()}/url", $payload);
    }

    /**
     * 获取配置的url
     *
     * @param array $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function getUrl(array $payload = [])
    {
        return $this->get("api/open/config/{$this->app->getUuid()}/url", $payload);
    }
}
