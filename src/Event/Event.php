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

use Fastwhal\HikDeviceGateway\Core\BaseService;

class Event extends BaseService
{
    //开启事件/报警订阅
    public function subscribeDeviceMgmt(array $params)
    {
        $endpoint = '/ISAPI/Event/notification/subscribeDeviceMgmt?format=json';
        $param = [
            'SubscribeDeviceMgmt' => $params,
        ];
        return $this->doHttpReuqest('POST', $endpoint, $param);
    }

    //获取指定设备已订阅的报警或事件类型。请求 URI 中的 ID 是指订阅 ID，uuid 是指设备 ID。
    public function getSubscribeDeviceMgmt(string $subId, string $devIndex)
    {
        $endpoint = '/ISAPI/Event/notification/subscribeDeviceMgmt/' . $subId . '/devIndex/' . $devIndex . '?format=json';
        $param = [
            'format' => 'json',
            'devIndex' => $devIndex,
            'id' => $subId,
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //获取指定设备已订阅的报警或事件类型(POST方式)。
    public function getSubscribeDeviceMgmtV2(string $subId, string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/Event/notification/subscribeDeviceMgmt/' . $subId . '/devIndex/' . $devIndex . '?format=json';
        $param = [
            'SubscribeDevEvent' => $params,
        ];
        return $this->doHttpReuqest('POST', $endpoint, $param);
    }

    //获取所有监听服务器参数。
    public function gethttpHosts(string $devIndex)
    {
        $endpoint = '/ISAPI/Event/notification/httpHosts?format=json&devIndex=' . $devIndex;
        $param = [
            'format' => 'json',
            'devIndex' => $devIndex,
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //添加监听服务器。。
    public function sethttpHosts(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/Event/notification/httpHosts?format=json&devIndex=' . $devIndex;
        $param = [
            'HttpHostNotificationList' => [
                [
                    'HttpHostNotification' => $params,
                ],
            ],
        ];
        return $this->doHttpReuqest('POST', $endpoint, $param);
    }
}
