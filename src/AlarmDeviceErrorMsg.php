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

class AlarmDeviceErrorMsg
{
    // 格式：  '次类型值'=>'次类型名称'
    // 1-设备报警
    public  $alarmDevMsg = [
        1024 => '防区短路报警',
        1025 => '防区断开报警',
        1026 => '防区异常报警',
        1027 => '防区恢复',
        1028 => '防区防拆报警',
        1029 => '防区防拆恢复',
        1030 => '读卡器防拆报警',
        1031 => '读卡器防拆',
        1032 => '报警输入报警触发',
        1033 => '报警输入恢复',
        1034 => '劫持报警',
        1035 => '离线事件存储内存不足报警',
        1036 => '最大刷卡身份验证失败报警',
        1037 => 'SD 卡存储满报警',
        1038 => '联动抓拍报警',
        1039 => '门控安全模块防拆报警',
        1040 => '门控安全模块防拆恢复',
    ];

    // 2-设备异常
    public  $deviceAbnormalityMsg = [
        39 => '网络断开',
        58 => 'RS485 连接异常',
        59 => 'RS485 连接恢复',
        1024 => '上电启动',
        1025 => '掉电关闭',
        1026 => '看门狗复位',
        1027 => '蓄电池电压低',
        1028 => '蓄电池电压恢复正常',
        1029 => '交流电断电',
        1030 => '交流电恢复',
        1031 => '网络恢复',
        1032 => 'Flash 读写异常',
        1033 => '读卡器掉线',
        1034 => '读卡器在线',
        1035 => '指示灯关闭',
        1036 => '指示灯恢复',
        1037 => '通道控制器掉线',
        1038 => '通道控制器在线',
        1039 => '门控安全模块掉线',
        1040 => '门控安全模块在线',
        1053 => '身份证阅读器未连接',
        1054 => '身份证阅读器已连接',
        1055 => '指纹模组未连接',
        1056 => '指纹模组已连接',
        1057 => '摄像机未连接',
        1058 => '摄像机已连接',
        1059 => 'COM 口未连接',
        1060 => 'COM 端已连接',
        1061 => '设备未授权',
        1062 => '人脸识别终端在线',
        1063 => '人脸识别终端离线',
        1064 => '本地登录锁定',
        1065 => '本地登录解锁',
    ];

    // 3-设备操作
    public  $deviceOperationMsg = [
        80 => '地登录',
        90 => '地升级',
        112 => '远程登录',
        113 => '远程注销登录',
        118 => '远程操作获取参数',
        119 => '远程操作：设置参数',
        120 => '远程操作：获取状态',
        121 => '远程布防',
        122 => '远程解除布防',
        123 => '远程重启',
        126 => '远程升级',
        134 => '远程操作：导出配置文件',
        135 => '远程操作：导入配置文件',
        214 => '远程操作：手动开启报警输出',
        215 => '远程操作：手动关闭报警输出',
        1024 => '远程开门',
        1025 => '远程关门',
        1026 => '远程常开',
        1027 => '远程常关',
        1028 => '远程：手动校时',
        1029 => '网络时间协议（NTP）校时',
        1030 => '远程操作：清空卡号',
        1031 => '远程操作：恢复默认参数',
        1032 => '防区布防',
        1033 => '防区撤防',
        1034 => '本地操作：恢复默认参数',
        1035 => '远程操作：抓拍',
        1036 => '修改网络中心参数配置',
        1037 => '修改 GPRS 中心参数配置',
        1038 => '修改控制中心参数配置',
        1039 => '输入解除码',
        1049 => '远程布防',
        1050 => '远程解除布防',
        1055 => 'M1 卡加密验证功能开启',
        1056 => 'M1 卡加密验证功能关闭',
        1057 => 'NFC 卡开门功能开启',
        1058 => 'NFC 卡开门关闭',
    ];

    // 5-设备事件
    public  $deviceEventMsg = [
        1 => '有效卡认证完成',
        2 => '刷卡加密码认证完成',
        3 => '刷卡加密码认证失败',
        4 => '刷卡加密码认证超时',
        5 => '刷卡加密码认证超次',
        6 => '未授权',
        7 => '无效刷卡时段',
        8 => '过期卡',
        9 => '卡号不存在',
        10 => '反潜回认证失败',
        11 => '互锁门未关闭',
        12 => '卡不在多重认证群组内',
        13 => '卡不在多重认证时间段内',
        14 => '多重认证：超级密码认证失败',
        15 => '多重认证完成',
        16 => '多重认证',
        17 => '首卡开门开始',
        18 => '首卡开门结束',
        19 => '常开状态开始',
        20 => '常开状态结束',
        21 => '门锁打开',
        22 => '门锁关闭',
        23 => '开门按钮打开',
        24 => '开门按钮放开',
        25 => '开门（门磁）',
        26 => '关门（门磁）',
        27 => '门异常打开（门磁）',
        28 => '门打开超时（门磁）',
        29 => '报警输出打卡',
        30 => '报警输出关闭',
        31 => '常关状态开始',
        32 => '常关状态结束',
        33 => '多重认证：远程开门',
        34 => '多重认证：超级密码认证完成',
        35 => '多重认证：重复认证',
        36 => '多重认证超时',
        37 => '门铃响',
        38 => '指纹匹配',
        39 => '指纹不匹配',
        40 => '刷卡加指纹认证完成',
        41 => '刷卡加指纹认证失败',
        42 => '刷卡加指纹认证超时',
        43 => '刷卡加指纹加密码认证完成',
        44 => '刷卡加指纹加密码认证失败',
        45 => '刷卡加指纹加密码认证超时',
        46 => '指纹加密码认证完成',
        47 => '指纹加密码认证失败',
        48 => '指纹加密码认证超时',
        49 => '指纹不存在',
        50 => '刷卡平台认证',
        51 => '呼叫中心',
        54 => '人脸加指纹认证完成',
        55 => '人脸加指纹认证失败',
        56 => '人脸加指纹认证超时',
        57 => '人脸加密码认证完成',
        58 => '人脸加密码认证失败',
        59 => '人脸加密码认证超时',
        60 => '人脸加刷卡认证完成',
        61 => '人脸加刷卡认证失败',
        62 => '人脸加刷卡认证超时',
        63 => '人脸加密码加指纹认证完成',
        64 => '人脸加密码加指纹认证失败',
        65 => '人脸加密码加指纹认证超时',
        66 => '人脸加刷卡加指纹认证完成',
        67 => '人脸加刷卡加指纹认证失败',
        68 => '人脸加刷卡加指纹认证超时',
        69 => '工号加指纹认证完成',
        70 => '工号加指纹认证失败',
        71 => '工号加指纹认证超时',
        72 => '工号加指纹加密码认证完成',
        73 => '工号加指纹加密码认证失败',
        74 => '工号加指纹加密码认证超时',
        75 => '人脸认证完成',
        76 => '人脸认证失败',
        77 => '工号加人脸认证完成',
        78 => '工号加人脸认证失败',
        79 => '工号加人脸认证超时',
        80 => '人脸识别失败',
        81 => '首卡认证开始',
        82 => '首卡认证结束',
        92 => '解锁异常',
        93 => '解锁超时',
        101 => '工号加密码认证完成',
        102 => '工号加密码认证失败',
        103 => '工号加密码认证超时',
        104 => '人脸防假探测失败',
        105 => '人脸加身份证认证',
        112 => '人脸加身份证认证失败',
        113 => '黑名单事件',
        114 => '有效信息',
        115 => '无效信息',
        116 => 'Mac 检测',
        119 => 'M1 卡加密认证失败',
        142 => '本地人脸模型失败',
        148 => '密码认证失败次数已达上限',
        151 => '密码不匹配',
        152 => '工号不存在',
        153 => '组合认证完成',
        154 => '组合认证超时',
        155 => '认证类型不匹配',
        156 => '通过二维码认证',
        157 => '通过 OQ 码认证失败',
        158 => '通过户主认证',
        159 => '通过蓝牙认证',
        160 => '通过蓝牙认证失败',
        162 => '认证失败：无效 Mifare 卡',
        163 => 'CPU 卡加密验证失败',
        164 => 'NFC 功能关闭验证失败',
        168 => 'EM 卡识别未启用',
        169 => 'M1 卡识别未启用',
        170 => 'CPU 卡识别未启用',
        171 => '身份证识别未启用',
        172 => '卡灌装密钥失败',
        173 => '本地升级失败',
        174 => '远程升级失败',
        175 => '远程扩展模块升级成功',
        176 => '远程扩展模块升级失败',
        177 => '远程指纹模组升级成功',
        178 => '远程指纹模组升级失败',
        179 => '动态验证码认证通过',
        180 => '动态验证码认证失败',
        181 => '密码认证通过',
        182 => '消费超时',
        183 => '纠错超时',
        184 => '消费金额超过最大值',
        185 => '消费次数满',
        186 => '用户消费确认超时',
        187 => '黑名单数量达到阈值',
        188 => 'Desfire 卡加密校验失败',
        189 => 'Desfire 卡识别未启用',
        190 => '虹膜认证通过',
        191 => '虹膜认证失败',
        192 => '虹膜活体检测失败',
        193 => '人员满提醒事件，人员数量超过 90%时产生',
    ];
}