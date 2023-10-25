<?php

declare(strict_types=1);
/**
 * This file is part of Kuaijing Bailing.
 *
 * @link     https://www.kuaijingai.com
 * @document https://help.kuaijingai.com
 * @contact  www.kuaijingai.com 7*12 9:00-21:00
 */
namespace Fastwhal\HikDeviceGateway\Gateway;

use Fastwhal\HikDeviceGateway\Core\Container;
use Fastwhal\HikDeviceGateway\Interfaces\Provider;

/**
 * @method getGatewayInfo()
 * @method setGatewayInfo(array $params)
 * @method rebootGateway()
 * @method getGatewayTime()
 * @method setGatewayTime(array $params)
 */
class GatewayCfgProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Gateway'] = function ($container) {
            return new GatewayCfg($container);
        };
    }
}
