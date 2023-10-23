<?php
declare(strict_types=1);
/**
 * This file is part of Kuaijing Bailing.
 *
 * @link     https://www.kuaijingai.com
 * @document https://help.kuaijingai.com
 * @contact  www.kuaijingai.com 7*12 9:00-21:00
 */
namespace Fastwhal\HikDeviceGateway\Event;

use Fastwhal\HikDeviceGateway\Core\Container;
use Fastwhal\HikDeviceGateway\Interfaces\Provider;

/**
 * @method subscribeDeviceMgmt(array $params)
 * @method getSubscribeDeviceMgmt(string $subId,string $devIndex)
 * @method gethttpHosts(string $devIndex)
 * @method sethttpHosts(string $devIndex,array $params)
 */
class EventProvider implements Provider
{

    public function serviceProvider(Container $container)
    {
        $container['Event'] = function ($container){
          return new Event($container);
        };
    }
}