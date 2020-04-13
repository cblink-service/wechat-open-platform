<?php
namespace Cblink\Service\Wechat\OpenPlatform\Tests;

use Cblink\Service\Wechat\OpenPlatform\Application;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Class AppTestCase
 * @package Cblink\Service\Client\Tests
 */
class TestCase extends BaseTestCase
{

    /**
     * @param $path
     * @return string
     */
    public function basePath($path = '')
    {
        return __DIR__ . '/../' . $path;
    }

    /**
     * @return Application
     */
    public function getApplication()
    {
        $config = [
            // 配置信息
            'config' => [
                'private' => true,
                'base_url' => 'http://127.0.0.1//',
                'app_id' => 1,
                'key' => 'test',
                'secret' => 'test',
            ],
            // 请求配置
            'request' => [
                'timeout' => 5,
                'http_errors' => false,
                'verify' => false,
            ],
            // 日志配置
            'log' => [
                'default' => 'single',
                'channels' => [
                    'single' => [
                        'driver' => 'single',
                        'path' => \sys_get_temp_dir().'/logs/cblink-service.log',
                        'level' => 'debug',
                    ],
                ],
            ],
        ];

        if (file_exists($fileName =__DIR__.'/../config/base.php')){
            $config = include $fileName;
        }

        return new Application($config);
    }
}
