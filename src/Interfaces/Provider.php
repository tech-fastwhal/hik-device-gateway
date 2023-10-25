<?php

declare(strict_types=1);
/**
 * This file is part of Kuaijing Bailing.
 *
 * @link     https://www.kuaijingai.com
 * @document https://help.kuaijingai.com
 * @contact  www.kuaijingai.com 7*12 9:00-21:00
 */
namespace Fastwhal\HikDeviceGateway\Interfaces;

use Fastwhal\HikDeviceGateway\Core\Container;

interface Provider
{
    /**
     * @return mixed
     */
    public function serviceProvider(Container $container);
}
