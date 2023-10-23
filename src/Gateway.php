<?php

declare(strict_types=1);
/**
 * This file is part of Kuaijing Bailing.
 *
 * @link     https://www.kuaijingai.com
 * @document https://help.kuaijingai.com
 * @contact  www.kuaijingai.com 7*12 9:00-21:00
 */

namespace Fastwhal\HikDeviceGateway;

use Fastwhal\HikDeviceGateway\AccessControl\Ac;
use Fastwhal\HikDeviceGateway\AccessControl\AcProvider;
use Fastwhal\HikDeviceGateway\Core\ContainerBase;
use Fastwhal\HikDeviceGateway\DeviceMgmt\DeviceMgmtProvider;
use Fastwhal\HikDeviceGateway\Event\EventProvider;
use Fastwhal\HikDeviceGateway\Gateway\GatewayCfgProvider;
use Fastwhal\HikDeviceGateway\Http\Client;
use Fastwhal\HikDeviceGateway\Stream\StreamProvider;

/**
 * @property DeviceMgmtProvider $DeviceMgmt
 * @property StreamProvider $Stream
 * @property AcProvider $Ac
 * @property EventProvider $Event
 * @property GatewayCfgProvider $Gateway
 */
class Gateway extends ContainerBase
{
    /**
     * 配置服务
     * @var string[]
     */
    protected $provider = [
        DeviceMgmtProvider::class,
        StreamProvider::class,
        AcProvider::class,
        EventProvider::class,
        GatewayCfgProvider::class
    ];

    private static $config;

    public function __construct(array $config)
    {
        self::$config = $config;
        Client::setAppConfig($config);
        parent::__construct();
    }

    public function getConfig()
    {
        return Client::getAppConfig();
    }

    public function getServiceUrl()
    {
        $config = Client::getAppConfig();
        $baseUri = $config['protocol'] . '://' . $config['host'] . ':' . $config['port'];
        return $baseUri;
    }
}
