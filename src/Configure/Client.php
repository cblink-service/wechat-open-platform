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
    public function bind(array $payload = [])
    {
        return $this->post('api/open/config', $payload);
    }

    /**
     * 保存配置的url
     *
     * @param array $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function storeUrls(array $payload = [])
    {
        return $this->post('api/open/config/url', $payload);
    }

    /**
     * 获取配置的webhook url
     *
     * @param array $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function getUrls(array $payload = [])
    {
        return $this->get('api/open/config/url', $payload);
    }

    /**
     * 获取事件配置的url
     *
     * @param string $event
     * @param array $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function getUrlsByEvent(string $event,array $payload = [])
    {
        return $this->get("api/open/config/url/{$event}", $payload);
    }
}
