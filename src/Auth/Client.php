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
        return $this->get('api/open/auth/url', $payload);
    }

    /**
     * 获取ticket
     *
     * @param array $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function getTicket(array $payload = [])
    {
        return $this->get('api/open/ticket', $payload);
    }
}
