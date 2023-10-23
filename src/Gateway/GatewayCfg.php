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

use Fastwhal\HikDeviceGateway\Core\BaseService;

class GatewayCfg extends BaseService
{
    //获取设备网关信息
    public function getGatewayInfo()
    {
        $url = '/ISAPI/System/deviceInfo?format=json';
        $param = [
            'format' => 'json',
        ];
        return $this->doHttpReuqest('GET',$url,$param);
    }

    //设置设备网关信息
    public function setGatewayInfo(array $params)
    {
        $url = '/ISAPI/System/deviceInfo?format=json';
        $param = [
            'DeviceInfo' => $params,
        ];
        return $this->doHttpReuqest('PUT',$url,$param);
    }

    //重启 Hik Device Gateway。
    public function rebootGateway()
    {
        $url = '/ISAPI/System/reboot?format=json';
        return $this->doHttpReuqest('PUT',$url);
    }


    //获取校时管理参数
    public function getGatewayTime()
    {
        $url = '/ISAPI/System/time?format=json';
        $param = [
            'format' => 'json',
        ];
        return $this->doHttpReuqest('GET',$url,$param);
    }

    //设置校时管理参数
    public function setGatewayTime(array $params)
    {
        $url = '/ISAPI/System/time?format=json';
        $param = [
            'Time' => $params,
        ];
        return $this->doHttpReuqest('PUT',$url,$param);
    }

}