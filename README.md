# hik-device-gateway
Hik Device Gateway API

> 基于 【Hik Device Gateway API】 版本 1.6.1 进行编写
>



 ## use

```php
composer require fastwhal/hik-device-gateway:dev-main
```

```php
<?php

require './vendor/autoload.php';

 use Fastwhal\HikDeviceGateway\Gateway;
 
 
 $config = [
    'protocol' => 'http', // 协议类型，例如： HTTP（V1.1）和 RTSP（V1.0）。
    'host' => '192.168.0.12', // 网络设备的主机名、IP 地址或域名全称
    'port' => '80', // 若该字段未配置，会使用默认端口号。HTTP 的默  认端口号为 80，RTSP 的默认端口号为 554，HTTPS 的默认端口号为 443。
    'username' => 'admin', // 网关账号
    'password' => '12345678', // 网关账号密码
];
 $hikGate = new Gateway($config);
 
function dump($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
 }


$params = [
    [
        'Device'=>[
            'protocolType' => \Fastwhal\HikDeviceGateway\BuiltInConstants::PROTOCOL_TYPE_ISUPV5,
            'EhomeParams'=>[
                'EhomeID'=>'K116770',
                'EhomeKey'=>'Ab2c321'
            ],
            'devName'=>'Api-人脸设备-2',
            'devType'=>\Fastwhal\HikDeviceGateway\BuiltInConstants::DEVICE_TYPE_ACCESSCONTROL
        ]
    ],
    [
        'Device'=>[
            'protocolType' => \Fastwhal\HikDeviceGateway\BuiltInConstants::PROTOCOL_TYPE_ISUPV5,
            'EhomeParams'=>[
                'EhomeID'=>'JK10012',
                'EhomeKey'=>'Abc3221'
            ],
            'devName'=>'Api-视频监控-2',
            'devType'=>\Fastwhal\HikDeviceGateway\BuiltInConstants::DEVICE_TYPE_ENCODEING
        ]
    ]
];


try {
     //添加设备
    $res = $hikGate->DeviceMgmt->addDevice($params);
    dump(['调用方成功---$res'=>$res]);
}catch (\GuzzleHttp\Exception\BadResponseException $exception){
    $resoponse = $exception->getResponse()->getBody()->getContents();
    dump(['调用方失败-BadResponseException--'=>$exception->getMessage(),'code'=>$exception->getCode(),'$resoponse'=>\json_decode($resoponse,true)]);
}

```