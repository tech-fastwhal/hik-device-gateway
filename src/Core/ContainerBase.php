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

class ContainerBase extends Container
{
    /**
     * @var array
     */
    protected $provider = [];

    public function __construct()
    {
        $providerCallback = function ($provider) {
            $obj = new $provider();
            $this->serviceRegsiter($obj);
        };
        array_walk($this->provider, $providerCallback);
    }

    public function __get($key)
    {
        return $this->offsetGet($key);
    }
}
