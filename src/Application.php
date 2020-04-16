<?php
namespace Cblink\Service\Wechat\OpenPlatform;

use Cblink\Service\Kennel\ServiceContainer;

/**
 * Class Application
 * @property Auth\Client $auth
 * @property Configure\Client $configure
 * @package Cblink\Service\Wechat
 */
class Application extends ServiceContainer
{
    /**
     * @var string
     */
    protected $base_url = 'https://api.service.cblink.net/wechat/';

    /**
     * @inheritDoc
     */
    protected function getCustomProviders(): array
    {
        return [
            Auth\ServiceProvider::class,
            Configure\ServiceProvider::class,
        ];
    }

    /**
     * @return mixed
     */
    public function getUuid() : string
    {
        return $this->config('uuid');
    }
}
