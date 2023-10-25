<?php

declare(strict_types=1);
/**
 * This file is part of Kuaijing Bailing.
 *
 * @link     https://www.kuaijingai.com
 * @document https://help.kuaijingai.com
 * @contact  www.kuaijingai.com 7*12 9:00-21:00
 */
namespace Fastwhal\HikDeviceGateway\Core;

use Fastwhal\HikDeviceGateway\Http\Client;

class BaseService
{
    use Client;

    public $nowApp;

    public $appRunConfig = [];

    public $verify = false;

    /**
     * 根据应用获取请求网址
     * @var string
     */
    public $baseUri = '';

    protected $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $class = get_class($app);
        $this->nowApp = basename(str_replace('\\', '/', $class));

        if ($this->nowApp == 'Gateway') {
            $this->appRunConfig = self::getAppConfig();

            if (! isset($this->appRunConfig['port'])) {
                $this->appRunConfig['port'] = 80;
            }
            $baseUri = $this->appRunConfig['protocol'] . '://' . $this->appRunConfig['host'] . ':' . $this->appRunConfig['port'];

            $this->baseUri = $baseUri;
        }
    }
}
