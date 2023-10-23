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

use Fastwhal\HikDeviceGateway\Core\BaseService;
use Fastwhal\HikDeviceGateway\Core\Container;
use Fastwhal\HikDeviceGateway\Support\TraitFunctions;

class DeviceMgmt extends BaseService
{
    use TraitFunctions;

    public static $key; // 密钥

    public static $iv; // 偏移量

    public function __construct(Container $app)
    {
        parent::__construct($app);

        self::$iv = 'hikCQtTOfastwhal';
    }

    public function aes128CBCEncodeWithOpenssl($data = '')
    {
        return base64_encode(openssl_encrypt($data, 'AES-128-CBC', self::$key, OPENSSL_RAW_DATA, self::$iv));
    }

    public function aes128CBCDecryptWithOpenssl($data = '')
    {
        return openssl_decrypt(base64_decode($data), 'AES-128-CBC', self::$key, OPENSSL_RAW_DATA, self::$iv);
    }

    /**
     * 添加设备至 Hik Device Gateway.
     */
    public function addDevice(array $params)
    {

        $param['DeviceInList'] = $params;

        return $this->doHttpReuqest('POST','/ISAPI/ContentMgmt/DeviceMgmt/addDevice?format=json', $param);
    }

    //获取设备列表
    public function getDeviceList(array $params)
    {
        $param['SearchDescription'] = $params;
        return $this->doHttpReuqest('POST','/ISAPI/ContentMgmt/DeviceMgmt/deviceList?format=json', $param);
    }

    //批量删除设备
    public function deleteDeviceList(array $params)
    {
        $param['DevIndexList'] = $params;
        return $this->doHttpReuqest('POST','/ISAPI/ContentMgmt/DeviceMgmt/delDevice?format=json',$param);
    }

    //删除单个设备
    public function deleteDevice(string $devIndex)
    {
        $endpoint = '/ISAPI/ContentMgmt/DeviceMgmt/delDevice? format=json&devIndex='.$devIndex;
        return $this->doHttpReuqest('DELETE',$endpoint);
    }

    //修改设备信息
    public function updateDevice(array $params)
    {
        $endpoint = '/ISAPI/ContentMgmt/DeviceMgmt/modDevice?format=json';
        $param['DeviceInfo'] = $params;
        return $this->doHttpReuqest('PUT',$endpoint,$param);
    }

    //获取设备的所有网络接口信息。
    public function getDeviceNetwork(string $devIndex)
    {
        $endpoint = '/ISAPI/System/Network/interfaces?format=json&devIndex='.$devIndex;
        $param = [
            'format'=>'json',
            'devIndex'=>$devIndex
        ];
        return $this->doHttpReuqest('GET',$endpoint,$param);
    }

    //获取设备参数。
    public function getDeviceInfo(string $devIndex)
    {
        $endpoint = '/ISAPI/System/deviceInfo?format=json&devIndex='.$devIndex;
        $param = [
            'format'=>'json',
            'devIndex'=>$devIndex
        ];
        return $this->doHttpReuqest('GET',$endpoint,$param);
    }

    //设置设备参数。
    public function setDeviceInfo(string $devIndex,array $params)
    {
        $endpoint = '/ISAPI/System/deviceInfo?format=json&devIndex='.$devIndex;
        $param = [
            'DeviceInfo'=>$params
        ];
        return $this->doHttpReuqest('PUT',$endpoint,$param);
    }

    //重启设备
    public function rebootDevice(string $devIndex)
    {
        $endpoint = '/ISAPI/System/reboot?format=json&devIndex='.$devIndex;
        return $this->doHttpReuqest('PUT',$endpoint);
    }

    //获取设备的校时参数
    public function getDeviceTime(string $devIndex)
    {
        $endpoint = '/ISAPI/System/time?format=json&devIndex='.$devIndex;
        $param = [
            'format'=>'json',
            'devIndex'=>$devIndex
        ];
        return $this->doHttpReuqest('GET',$endpoint,$param);
    }

    //设置设备的校时参数。
    public function setDeviceTime(string $devIndex,array $params)
    {
        $endpoint = '/ISAPI/System/time?format=json&devIndex='.$devIndex;
        $param = [
            'Time'=>$params
        ];
        return $this->doHttpReuqest('PUT',$endpoint,$param);
    }

    //获取设备时区。
    public function getDeviceTimeZone(string $devIndex)
    {
        $endpoint = '/ISAPI/System/time/timeZone?devIndex='.$devIndex;
        $param = [
            'format'=>'json',
            'devIndex'=>$devIndex
        ];
        return $this->doHttpReuqest('GET',$endpoint,$param);
    }

    //设置设备时区。
    public function setDeviceTimeZone(string $devIndex,string $timezone)
    {
        $endpoint = '/ISAPI/System/time/timeZone?devIndex='.$devIndex;
        $param = [
            ''=>$timezone
        ];
        return $this->doHttpReuqest('PUT',$endpoint,$param);
    }

    /**
     * @param string $id ID 是指报警输出编号
     * @param string $devIndex
     * @param string $outputState 必选项，string，输出状态：“high"-高电平，“low”-低电平
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function trigger(string $id,string $devIndex,string $outputState)
    {
        $endpoint = '/ISAPI/System/IO/outputs/'.$id.'/trigger?format=json&devIndex='.$devIndex;
        $param = [
            'IOPortData'=>[
                'outputState'=>$outputState
            ]
        ];
        return $this->doHttpReuqest('PUT',$endpoint,$param);
    }

    //获取指定网络接口信息
    public function getDeviceNetworkById(string $id,string $devIndex)
    {
        $endpoint = '/ISAPI/System/Network/interfaces/'.$id.'?format=json&devIndex='.$devIndex;
        $param = [
            'format'=>'json',
            'devIndex'=>$devIndex
        ];
        return $this->doHttpReuqest('GET',$endpoint,$param);
    }

    //设置指定网络接口信息
    public function setDeviceNetworkById(string $id,string $devIndex,array $params)
    {
        $endpoint = '/ISAPI/System/Network/interfaces/'.$id.'?format=json&devIndex='.$devIndex;
        $param = [
            'NetworkInterface'=>$params
        ];
        return $this->doHttpReuqest('PUT',$endpoint,$param);
    }

    //获取指定网络接口的 IP 地址。
    public function getDeviceIpAddress(string $id,string $devIndex)
    {
        $endpoint = '/ISAPI/System/Network/interfaces/'.$id.'/ipAddress?format=json&devIndex='.$devIndex;
        $param = [
            'format'=>'json',
            'devIndex'=>$devIndex
        ];
        return $this->doHttpReuqest('GET',$endpoint,$param);
    }

    //获取指定网络接口的 IP 地址。
    public function setDeviceIpAddress(string $id,string $devIndex,array $params)
    {
        $endpoint = '/ISAPI/System/Network/interfaces/'.$id.'/ipAddress?format=json&devIndex='.$devIndex;
        $param = [
            'IPAddress'=>$params
        ];
        return $this->doHttpReuqest('PUT',$endpoint,$param);
    }

    //通过从 FTP（文件传输协议）服务器上下载的升级包升级设备
    public function upgradeEhome(string $devIndex,array $params)
    {
        $endpoint = '/ISAPI/System/upgradeEhome?format=json&devIndex='.$devIndex;
        $param = [
            'UpgradeParams'=>$params
        ];
        return $this->doHttpReuqest('PUT',$endpoint,$param);
    }

    //获取设备报警输入输出信息。
    public function getDeviceAlarmIOInfo(string $devIndex)
    {
        $endpoint = '/ISAPI/System/IO?format=json&devIndex='.$devIndex;
        $param = [
            'format'=>'json',
            'devIndex'=>$devIndex
        ];
        return $this->doHttpReuqest('GET',$endpoint,$param);
    }
}
