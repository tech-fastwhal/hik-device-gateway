<?php

declare(strict_types=1);
/**
 * This file is part of Kuaijing Bailing.
 *
 * @link     https://www.kuaijingai.com
 * @document https://help.kuaijingai.com
 * @contact  www.kuaijingai.com 7*12 9:00-21:00
 */

namespace Fastwhal\HikDeviceGateway\Stream;

use Fastwhal\HikDeviceGateway\Core\Container;
use Fastwhal\HikDeviceGateway\Interfaces\Provider;

/**
 * @method getPreview(string $devIndex, array $params)
 * @method getPlayBack(string $devIndex, array $params)
 * @method getTwoWayAudio(string $id,string $devIndex)
 * @method startRecord(string $id,string $devIndex)
 * @method stopRecord(string $id,string $devIndex)
 * @method getRecordPlan(string $devIndex)
 * @method addRecordPlan(string $devIndex,array $params)
 * @method setRecordPlan($id,string $devIndex,array $params)
 * @method ptzCtrlTurn($id,string $devIndex,array $params)
 * @method setVideoChannel($id,string $devIndex,int $focus)
 * @method getStreamChannelConfig($id,string $devIndex)
 * @method setStreamChannelConfig($id,string $devIndex,array $params)
 *
 * @method picture($channelID,string $devIndex)
 * @method wakeUp(string $devIndex)
 * @method downloadVideoFile(string $devIndex,string $playbackURI)
 */
class StreamProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Stream'] = function ($container) {
            return new Stream($container);
        };
    }
}
