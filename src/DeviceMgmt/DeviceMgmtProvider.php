<?php

declare(strict_types=1);
/**
 * This file is part of Kuaijing Bailing.
 *
 * @link     https://www.kuaijingai.com
 * @document https://help.kuaijingai.com
 * @contact  www.kuaijingai.com 7*12 9:00-21:00
 */

namespace Fastwhal\HikDeviceGateway\DeviceMgmt;

use Fastwhal\HikDeviceGateway\Core\Container;
use Fastwhal\HikDeviceGateway\Interfaces\Provider;

/**
 * @method addDevice(array $params)
 * @method gatewayInfo()
 * @method getDeviceList(array $params)
 * @method getDeviceInfo(string $devIndex)
 * @method deleteDeviceList(array $params)
 * @method deleteDevice(string $devIndex)
 * @method updateDevice(array $params)
 * @method getDeviceNetwork(string $devIndex)
 * @method setDeviceInfo(string $devIndex,array $params)
 * @method rebootDevice(string $devIndex)
 * @method getDeviceTime(string $devIndex)
 * @method setDeviceTime(string $devIndex,array $params)
 * @method getDeviceTimeZone(string $devIndex)
 * @method setDeviceTimeZone(string $devIndex,string $timezone)
 * @method trigger(string $id,string $devIndex,string $outputState)
 * @method getDeviceNetworkById(string $id,string $devIndex)
 * @method setDeviceNetworkById(string $id,string $devIndex,array $params)
 * @method getDeviceIpAddress(string $id,string $devIndex)
 * @method setDeviceIpAddress(string $id,string $devIndex,array $params)
 * @method upgradeEhome(string $devIndex,array $params)
 * @method getDeviceAlarmIOInfo(string $devIndex)
 *
 */
class DeviceMgmtProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['DeviceMgmt'] = function ($container) {
            return new DeviceMgmt($container);
        };
    }
}
