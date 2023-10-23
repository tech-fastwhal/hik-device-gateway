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

class StatusCodeErrMsg
{

    public static function getStatusCodeMsg(int $statusCode,string $subCode)
    {
        if (isset(self::$statusArr[$statusCode]) && isset(self::$statusArr[$statusCode][$subCode])){

            return   self:: $statusArr[$statusCode][$subCode];
        }
        return '无法识别错误号：['.$statusCode .'] 和 子状态：['.$subCode.']';
    }

    public static function getStatusTxt(int $statusCode)
    {
        if (isset(self::$status[$statusCode])){
            return self::$status[$statusCode];
        }
        return $statusCode;
    }

    private static $status = [
        1 => '正常',
        2=> '设备繁忙',
        3=>'设备错误',
        4=>'操作无效',
        5=>'报文格式无效',
        6=>'报文内容无效',
        7=>'需要重启设备',
    ];

    /**
     * 设备网关 SDK 的状态码是根据 HTTP 协议的状态码进行分类的。
     * 预先规定的 7 种状态码包括 1-正常，2-设备繁忙，3-设备错误，4-操作无效，5-报文格式无效，6-报文内容无效，7-需要重启设备。
     * 每个状态码包含多个子状态码。
     * @var array
     */
    public static $statusArr = [
        1 =>[
            'ok'=>'操作完成',
            'riskPassword'=>'风险密码'
        ],
        2 =>[
            'noMemory'=>'内存不足',
            'upgrading'=>'正在升级。',
            'networkError'=>'网络出错。',
        ],
        3=>[
            'deviceError'=>'硬件错误。',
            'createSocketError'=>'创建套接字失败。',
            'sendRequestError'=>'发送请求失败。',
            'passwordDecodeError'=>'密码解密失败。',
            'passwordEncryptError'=>'密码加密失败。',
            'pictureUploadFailed'=>'上传图片失败。',
            'connecteDatabaseError'=>'连接到数据库失败。',
            'internalError'=>'内部错误。',
            'uninitialized'=>'未初始化。',
            'fileSizeExceedError'=>'人脸图片超过 200KB。'
        ],
        4=>[
            'notSupport'=>'操作不支持。',
            'lowPrivilege'=>'没有权限。',
            'badAuthorization'=>'认证失败。',
            'methodNotAllowed'=>'HTTP 方法无效。',
            'notActivated'=>'未激活。',
            'hasActivated'=>'已激活。',
            'invalidContent'=>'报文内容无效。',
            'maxSessionUserLink'=>'登录用户数量已达上限。',
            'loginPasswordError'=>'密码错误。',
            'interfaceOperationError'=>'操作失败。',
            'openFileError'=>'打开文件失败。',
            'taskPacking'=>'资源已被占用。',
            'taskNoRecFile'=>'视频文件不存在。',
            'updateLangUnmatched'=>'升级包语言不匹配。',
            'userMaxNum'=>'可添加用户数量已达上限。',
            'monitorNodeOverLimit'=>'可添加监控点数量已达上限。',
            'deviceExist'=>'该设备已添加。',
            'pwdErrorLoginFailed'=>'登录失败。请检查用户名和密码。',
            'setArmingError'=>'设置布防信息失败。',
            'taskModifyFailed'=>'编辑任务失败。',
            'getDeviceInfoFailed'=>'获取设备信息失败。',
            'noDiskSpace'=>'硬盘容量不足。',
            'cannotSameAsOldPassword'=>'新密码不能和旧密码相同。',
            'originalPassError'=>'旧密码错误。',
            'writeFileError'=>'写入文件失败。',
            'accessFileDirectoryFailed'=>'获取文件路径失败。',
            'unKnownErrorCode'=>'未知错误码。',
            'deviceVervisionNotMatch'=>'设备版本不匹配。',
            'theSessionIdDoesNotExist'=>'会话 ID 不存在。',
            'theCameraIdDoesNotExist'=>'监控点 ID 不存在。',
            'theDeviceIdDoesNotExist'=>'设备 ID 不存在。',
            'gettingResourceNodeInformationFailed'=>'获取资源节点信息失败。',
            'noMoreTasksCanBeAdded'=>'任务数量已达上限。',
            'TheImageServerConfiguration'=>'图片服务异常',
            'storageSpaceNotEnough'=>'磁盘空间不足上传图片失败',
            'badAuthorization'=>'认证失败。',
            'badDevIndex'=>'设备 DevIndex 参数错误。',
            'badDevChannel'=>'设备通道错误。',
            'devOffline'=>'设备离线。',
            'devSleep'=>'设备休眠。',
            'rtspPortAbnormal'=>'rtsp 端口异常。',
            'internalCommErr'=>'媒体服务内部信令通信异常。',
            'reachPreviewLimit'=>'媒体服务预览路数超出上限 500。',
            'reachPlaybackLimit'=>'媒体服务回放路数超出上限 100。',
            'reachDownloadLimit'=>'媒体服务下载路数超出上限 64。',
            'reachAudioTalkLimit'=>'媒体服务语音对讲路数超出上限 100。',
            'reachIsup5ConcurrentStreamLimit'=>'媒体服务繁忙，请稍后再试。',
            'reachIsup2ConcurrentStreamLimit'=>'媒体服务繁忙，请稍后再试。',
            'isup5PreviewPortAbnormal'=>'网关 ISUP5.0 预览设备端口异常。',
            'isup5PlaybackPortAbnormal'=>'网关 ISUP5.0 回放设备端口异常。',
            'isup5AudioPortAbnormal'=>'网关 ISUP5.0 对讲设备端口异常。',
            'isup5SearchRecordResultEmpty'=>'ISUP5.0 设备录像搜索无录像.',
            'isup5PreviewVideoFormatErr'=>'ISUP5.0 设备预览视频格式不支 持。',
            'isup5PreviewAudioFormatErr'=>'ISUP5.0 设备预览音频格式不支 持。',
            'isup5PlaybackVideoFormatErr'=>'ISUP5.0 设备回放视频格式不支 持。',
            'isup5PlaybackAudioFormatErr'=>'ISUP5.0 设备回放音频格式不支 持。',
            'isup5AudioTalkAudioFormatErr'=>'ISUP5.0 设备对讲音频格式不支 持。',
            'isup5PreviewPushErr'=>'ISUP5.0 设备预览推流失败。',
            'isup5PlaybackPushErr'=>'ISUP5.0 设备回放推流失败。',
            'isup5AudioTalkPushErr'=>'ISUP5.0 设备对讲推流失败。',
            'isup2PortExhausted'=>'ISUP2.0 端口池资源耗尽。',
            'isup2PreviewVideoErr'=>'ISUP2.0 设备预览视频格式不支 持。',
            'isup2PreviewAudioErr'=>'ISUP2.0 设备预览音频格式不支 持。',
            'isup2PreviewPushErr'=>'ISUP2.0 设备预览推流失败。',
            'isup2SearchRecordResultEmpty'=>'ISUP2.0 设备录像搜索无录像。',
            'isup2PlaybackVideoErr'=>'ISUP2.0 设备回放视频格式不支 持。',
            'isup2PlaybackAudioErr'=>'ISUP2.0 设备回放音频格式不支 持。',
            'isup2PlaybackPushErr'=>'ISUP2.0 设备回放推流失败。',
            'isup2AudioTalkPushErr'=>'ISUP2.0 设备对讲推流失败。',
            'isup2AudioTalkAudioErr'=>'ISUP2.0 设备对讲音频格式不支 持。',
        ],
        5=>[
            'badJsonFormat'=>'无效的 JSON 格式。',
            'badURLFormat'=>'无效的 URL 格式。',
         ],
        6=>[
            'badParameters'=>'参数错误。',
            'badXmlContent'=>'XML 报文内容错误。',
            'badPort'=>'端口号冲突。',
            'portError'=>'端口号无效。',
            'badVersion'=>'版本不匹配。',
            'requestMemoryNULL'=>'请求内存为空。',
            'tokenTimeout'=>'令牌超时。',
            'passworLlenNoMoreThan16'=>'密码最大长度为 16 个字符。',
            'diskError'=>'硬盘错误。',
        ],
        7=>[
            'rebootRequired'=>'需重启设备。',
        ]
    ];

}