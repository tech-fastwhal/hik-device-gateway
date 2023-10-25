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

/**
 * 内置常量.
 */
class BuiltInConstants
{
    /**
     * @var 协议类型-ISUP（智能安全上行协议）
     */
    public const PROTOCOL_TYPE_ISUP = 'ehome';

    /**
     * @var 协议类型-ISUP 5.0
     */
    public const PROTOCOL_TYPE_ISUPV5 = 'ehomeV5';

    /**
     * @var 协议类型-ISAPI
     */
    public const PROTOCOL_TYPE_ISAPI = 'ISAPI';

    /**
     * @var 设备类型-编码设备
     */
    public const DEVICE_TYPE_ENCODEING = 'encodingDev';

    /**
     * @var 设备类型-门禁设备
     */
    public const DEVICE_TYPE_ACCESSCONTROL = 'AccessControl';

    /**
     * @var 人员类型-普通人/主人
     */
    public const USER_TYPE_NORMAL = 'normal';

    /**
     * @var 人员类型-访客
     */
    public const USER_TYPE_VISTOR = 'visitor';

    /**
     * @var 人员类型-黑名单人员
     */
    public const USER_TYPE_BLACKLIST = 'blackList';

    /**
     * @var 设备在线状态-在线
     */
    public const DEVICE_STATUS_ONLINE = 'online';

    /**
     * @var 设备在线状态-离线
     */
    public const DEVICE_STATUS_OFFLINE = 'offline';

    /**
     * @var 设备在线状态-休眠
     */
    public const DEVICE_STATUS_SLEEP = 'sleep';

    /**
     * @var 码流类型:主码流
     */
    public const STREAM_TYPE_MAIN = 'main';

    /**
     * @var 码流类型:子码流
     */
    public const STREAM_TYPE_SUB = 'sub';

    /**
     * @var 流取流方式：预览
     */
    public const STREAM_METHOD_PREVIEW = 'preview';

    /**
     * @var 流取流方式：回放
     */
    public const STREAM_METHOD_PLAYBACK = 'playback';

    /**
     * @var 流取流方式：对讲
     */
    public const STREAM_METHOD_TWOWAYAUDIO = 'twoWayAudio';

    /**
     * @var 元数据描述符:所有录像类型
     */
    public const METADATA_ALLEVENT = 'recordType.meta.hikvision.com/AllEvent';

    /**
     * @var 元数据描述符:定是录像
     */
    public const METADATA_CMR = 'recordType.meta.hikvision.com/CMR';

    /**
     * @var 元数据描述符:移动侦测
     */
    public const METADATA_MOTION = 'recordType.meta.hikvision.com/MOTION';

    /**
     * @var 元数据描述符:报警触发
     */
    public const METADATA_ALARM = 'recordtype.meta.hikvision.com/ALARM';

    /**
     * @var 元数据描述符:报警或移动侦测
     */
    public const METADATA_EDR = 'recordType.meta.hikvision.com/EDR';

    /**
     * @var 元数据描述符:报警和移动侦测
     */
    public const METADATA_ALARMANDMOTION = 'recordtype.meta.hikvision.com/ALARMANDMOTION';
}
