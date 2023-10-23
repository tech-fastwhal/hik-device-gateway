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

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

trait CacheAdapter
{
    protected $access_token;

    protected $ys_access_token;

    protected $cachePrefix = 'fastwhal.hik.gateway.core.access_token';

    protected $cacheYsPrefix = 'fastwhal.hik.gateway.core.access_token';

    private static $instance;

    public static function getInstance()
    {
        if (! self::$instance) {
            self::$instance = new FilesystemAdapter();
        }

        return self::$instance;
    }

    protected function getCacheKey($credentials)
    {
        return $this->cachePrefix . md5(\json_encode($credentials));
    }

    protected function getYsCacheKey($credentials)
    {
        return $this->cacheYsPrefix . md5(\json_encode($credentials));
    }
}
