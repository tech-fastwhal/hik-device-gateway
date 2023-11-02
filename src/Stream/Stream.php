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

use Fastwhal\HikDeviceGateway\Core\BaseService;

class Stream extends BaseService
{
    // 开始预览
    public function getPreview(string $devIndex, array $params)
    {
        $url = '/ISAPI/System/streamMedia?format=json&devIndex=' . $devIndex;
        $param['StreamInfo'] = $params;
        $header = [
            'Content-Type' => 'application/octet-stream',
        ];
        return $this->doHttpReuqest('POST', $url, $param, $header);
    }

    // 开始回放
    public function getPlayBack(string $devIndex, array $params)
    {
        $url = '/ISAPI/ContentMgmt/search?format=json&devIndex=' . $devIndex;
        $param = [
            'CMSearchDescription' => $params,
        ];
        return $this->doHttpReuqest('POST', $url, $param);
    }

    //获取对讲通道
    public function getTwoWayAudio(string $id, string $devIndex)
    {
        $url = '/ISAPI/System/TwoWayAudio/channels/' . $id . '?format=json&devIndex=' . $devIndex;
        $params = [
            'devIndex' => $devIndex,
            'format' => 'json',
        ];
        return $this->doHttpReuqest('GET', $url, $params);
    }

    //开始通道录像
    public function startRecord(string $id, string $devIndex)
    {
        $url = '/ISAPI/ContentMgmt/record/control/manual/start/tracks/' . $id . '?format=json&devIndex=' . $devIndex;
        $params = [
            'devIndex' => $devIndex,
            'format' => 'json',
        ];
        return $this->doHttpReuqest('POST', $url, $params);
    }

    //停止通道录像
    public function stopRecord(string $id, string $devIndex)
    {
        $url = '/ISAPI/ContentMgmt/record/control/manual/stop/tracks/' . $id . '?format=json&devIndex=' . $devIndex;
        $params = [
            'devIndex' => $devIndex,
            'format' => 'json',
        ];
        return $this->doHttpReuqest('POST', $url, $params);
    }

    //获取通道录像计划
    public function getRecordPlan(string $devIndex)
    {
        $url = '/ISAPI/ContentMgmt/record/tracks?format=json&devIndex=' . $devIndex;
        $params = [
            'devIndex' => $devIndex,
            'format' => 'json',
        ];
        return $this->doHttpReuqest('GET', $url, $params);
    }

    //增加通道录像计划
    public function addRecordPlan(string $devIndex, array $params)
    {
        $url = '/ISAPI/ContentMgmt/record/tracks?format=json&devIndex=' . $devIndex;
        $param['Track'] = $params;
        return $this->doHttpReuqest('POST', $url, $param);
    }

    //设置通道录像计划
    public function setRecordPlan($id, string $devIndex, array $params)
    {
        $url = '/ISAPI/ContentMgmt/record/tracks/' . $id . '?format=json&devIndex=' . $devIndex;
        $param['Track'] = $params;
        return $this->doHttpReuqest('PUT', $url, $param);
    }

    //开始 PTZ 转动
    public function ptzCtrlTurn($id, string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/PTZCtrl/channels/' . $id . '/continuous?format=json&devIndex=' . $devIndex;
        $param['PTZData'] = $params;
        return $this->doHttpReuqest('PUT', $endpoint, $param);
    }

    //设置指定通道的聚焦参数。
    public function setVideoChannel($id, string $devIndex, int $focus)
    {
        $endpoint = '/ISAPI/System/Video/inputs/channels/' . $id . '/focus?format=json&devIndex=' . $devIndex;
        $param['FocusData'] = [
            'focus' => $focus,
        ];
        return $this->doHttpReuqest('PUT', $endpoint, $param);
    }

    //批量获取全部通道的视频输入参数。
    public function getChannels(string $devIndex)
    {
        $endpoint = '/ISAPI/System/Video/inputs/channels?format=json&devIndex=' . $devIndex;
        $param = [
            'format' => 'json',
            'devIndex' => $devIndex,
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //获取或设置指定通道的压缩参数。
    public function getStreamChannelConfig($id, string $devIndex)
    {
        $endpoint = '/ISAPI/Streaming/channels/' . $id . '?format=json&devIndex=' . $devIndex;
        $param = [
            'format' => 'json',
            'devIndex' => $devIndex,
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //设置指定通道的压缩参数。
    public function setStreamChannelConfig($id, string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/Streaming/channels/' . $id . '?format=json&devIndex=' . $devIndex;
        $param = [
            'StreamingChannel' => $params,
        ];
        return $this->doHttpReuqest('PUT', $endpoint, $param);
    }

    //手动抓图。
    public function picture($channelID, string $devIndex)
    {
        $endpoint = '/ISAPI/Streaming/channels/' . $channelID . '/picture?format=json&devIndex=' . $devIndex;
        $param = [
            'format' => 'json',
            'devIndex' => $devIndex,
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //唤醒休眠的设备。
    public function wakeUp(string $devIndex)
    {
        $endpoint = '/ISAPI/System/wakeUp?format=json&devIndex=' . $devIndex;
        $param = [
            'format' => 'json',
            'devIndex' => $devIndex,
        ];
        return $this->doHttpReuqest('PUT', $endpoint, $param);
    }

    public function downloadVideoFile(string $devIndex, string $playbackURI)
    {
        $endpoint = '/ISAPI/ContentMgmt/download?format=json&devIndex=' . $devIndex;
        $param = [
            'downloadRequest' => [
                'playbackURI' => $playbackURI,
            ],
        ];
        return $this->doHttpReuqest('POST', $endpoint, $param);
    }
}
