<?php

declare(strict_types=1);
/**
 * This file is part of Kuaijing Bailing.
 *
 * @link     https://www.kuaijingai.com
 * @document https://help.kuaijingai.com
 * @contact  www.kuaijingai.com 7*12 9:00-21:00
 */
namespace Fastwhal\HikDeviceGateway\AccessControl;

use Fastwhal\HikDeviceGateway\Core\BaseService;

class Ac extends BaseService
{
    /**
     * ====================================================
     *  管理人员信息
     * ====================================================.
     */
    //获取访问控制能力。
    public function getCapabilities(string $devIndex)
    {
        $endpoint = '/ISAPI/AccessControl/capabilities?format=json&devIndex=' . $devIndex;
        $param = [
            'devIndex' => $devIndex,
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //添加人员。(一次最多可添加 30 个人员。)
    public function addUsers(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/UserInfo/Record?format=json&devIndex=' . $devIndex;
        $param = [
            'UserInfo' => $params,
        ];
        return $this->doHttpReuqest('POST', $endpoint, $param);
    }

    public function updateUser(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/UserInfo/Modify?format=json&devIndex=' . $devIndex;
        $param = [
            'UserInfo' => $params,
        ];
        return $this->doHttpReuqest('PUT', $endpoint, $param);
    }

    public function getUserCount(string $devIndex)
    {
        $endpoint = '/ISAPI/AccessControl/UserInfo/Count?format=json&devIndex=' . $devIndex;
        $param = [
            'devIndex' => $devIndex,
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //查询人员详情。
    public function searchUserInfo(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/UserInfo/Search?format=json&devIndex=' . $devIndex;
        $param = [
            'UserInfoSearchCond' => $params,
        ];
        return $this->doHttpReuqest('POST', $endpoint, $param);
    }

    //删除人员和关联的权限。
    public function deleteUser(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/UserInfoDetail/Delete?format=json&devIndex=' . $devIndex;
        $param = [
            'UserInfoDetail' => $params,
        ];
        return $this->doHttpReuqest('PUT', $endpoint, $param);
    }

    //获取人员信息和权限删除进度。
    public function getDeleteUserProcess(string $devIndex)
    {
        $endpoint = '/ISAPI/AccessControl/UserInfoDetail/DeleteProcess?format=json&devIndex=' . $devIndex;
        $param = [
            'devIndex' => $devIndex,
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    /**
     * ====================================================
     *  卡 管理
     * ====================================================.
     */

    //添加单张卡片
    public function addCard(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/CardInfo/Record?format=json&devIndex=' . $devIndex;
        $param = [
            'CardInfo' => $params,
        ];
        return $this->doHttpReuqest('POST', $endpoint, $param);
    }

    //修改单张卡片
    public function updateCard(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/CardInfo/Modify?format=json&devIndex=' . $devIndex;
        $param = [
            'CardInfo' => $params,
        ];
        return $this->doHttpReuqest('PUT', $endpoint, $param);
    }

    //删除卡片
    public function deleteCard(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/CardInfo/Delete?format=json&devIndex=' . $devIndex;
        $param = [
            'CardInfoDelCond' => $params,
        ];
        return $this->doHttpReuqest('PUT', $endpoint, $param);
    }

    //获取已添加的卡片总数
    public function getCardCount(string $devIndex)
    {
        $endpoint = '/ISAPI/AccessControl/CardInfo/Count?format=json&devIndex=' . $devIndex;
        $param = [
            'devIndex' => $devIndex,
            'format' => 'json',
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //查询卡片信息
    public function searchCard(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/CardInfo/Search?format=json&devIndex=' . $devIndex;
        $param = [
            'CardInfoSearchCond' => $params,
        ];
        return $this->doHttpReuqest('POST', $endpoint, $param);
    }

    /**
     * ====================================================
     *  人脸管理
     * ====================================================.
     */
    //通过上传二进制数据的方式添加单个人脸记录
    public function addFaceData(string $devIndex, array $params, string $imgeUrl)
    {
        $endpoint = '/ISAPI/Intelligent/FDLib/FaceDataRecord?format=json&devIndex=' . $devIndex;
        $param = [
            'FaceInfo' => $params,
        ];
        return $this->setImageUrl($imgeUrl)->doHttpReuqest('POST', $endpoint, $param);
    }

    //删除人脸记录
    public function deleteFaceData(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/Intelligent/FDLib/FDSearch/Delete?format=json&devIndex=' . $devIndex;
        $param = [
            'FaceInfoDelCond' => $params,
        ];
        return $this->doHttpReuqest('PUT', $endpoint, $param);
    }

    //获取人脸数据记录总数
    public function getFaceCount(string $devIndex)
    {
        $endpoint = '/ISAPI/Intelligent/FDLib/Count?format=json&devIndex=' . $devIndex;
        $param = [
            'devIndex' => $devIndex,
            'format' => 'json',
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //查询人脸记录
    public function searchFace(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/Intelligent/FDLib/FDSearch?format=json&devIndex=' . $devIndex;
        return $this->doHttpReuqest('POST', $endpoint, $params);
    }

    /**
     * ====================================================
     *  管理指纹信息
     * ====================================================.
     */
    //获取指纹配置能力
    public function getFingerPrintCfg(string $devIndex)
    {
        $endpoint = '/ISAPI/AccessControl/FingerPrintCfg/capabilities?format=json&devIndex=' . $devIndex;
        $param = [
            'devIndex' => $devIndex,
            'format' => 'json',
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    /**
     * @param string $id URI 中的<ID> 代表读卡器编号，从 1 开始
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getCardReaderCfg(string $id, string $devIndex)
    {
        $endpoint = '/ISAPI/AccessControl/CardReaderCfg/' . $id . '?format=json&devIndex=' . $devIndex;
        $param = [
            'devIndex' => $devIndex,
            'format' => 'json',
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    // 设置读卡器参数
    public function setCardReaderCfg(string $id, string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/CardReaderCfg/' . $id . '?format=json&devIndex=' . $devIndex;
        $param = [
            'CardReaderCfg' => $params,
        ];
        return $this->doHttpReuqest('PUT', $endpoint, $param);
    }

    //添加指纹
    public function addFingerPrint(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/FingerPrintDownload?format=json&devIndex=' . $devIndex;
        $param = [
            'FingerPrintCfg' => $params,
        ];
        return $this->doHttpReuqest('POST', $endpoint, $param);
    }

    //获取指纹参数下发进度。
    public function getFingerPrintProgress(string $devIndex)
    {
        $endpoint = '/ISAPI/AccessControl/FingerPrintProgress?format=json&devIndex=' . $devIndex;
        $param = [
            'devIndex' => $devIndex,
            'format' => 'json',
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //修改指纹参数。
    public function updateFingerPrint(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/FingerPrintModify?format=json&devIndex=' . $devIndex;
        $param = [
            'FingerPrintModify' => $params,
        ];
        return $this->doHttpReuqest('POST', $endpoint, $param);
    }

    //采集指纹数据。
    public function captureFingerPrint(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/CaptureFingerPrint?format=json&devIndex=' . $devIndex;
        $param = [
            'CaptureFingerPrint' => $params,
        ];
        return $this->doHttpReuqest('POST', $endpoint, $param);
    }

    //查询指纹信息。
    public function getFingerPrint(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/FingerPrintUpload?format=json&devIndex=' . $devIndex;
        $param = [
            'FingerPrintCond' => $params,
        ];
        return $this->doHttpReuqest('POST', $endpoint, $param);
    }

    //获取指纹删除能力。
    public function getDeleteFingerPrint(string $devIndex)
    {
        $endpoint = '/ISAPI/AccessControl/FingerPrint/Delete/capabilities?format=json&devIndex=' . $devIndex;
        $param = [
            'format' => 'json',
            'devIndex' => $devIndex,
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //删除指纹信息。。
    public function deleteFingerPrint(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/FingerPrint/Delete?format=json&devIndex=' . $devIndex;
        $param = [
            'FingerPrintDelete' => $params,
        ];
        return $this->doHttpReuqest('PUT', $endpoint, $param);
    }

    //获取指纹删除进度。
    public function getDeleteFingerPrintProgress(string $devIndex)
    {
        $endpoint = '/ISAPI/AccessControl/FingerPrint/DeleteProcess?format=json&devIndex=' . $devIndex;
        $param = [
            'format' => 'json',
            'devIndex' => $devIndex,
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    /**
     * ====================================================
     *  远程控制门
     * ====================================================.
     */

    //获取访问控制能力。
    public function getAcCapabilities(string $devIndex)
    {
        $endpoint = '/ISAPI/AccessControl/capabilities?format=json&devIndex=' . $devIndex;
        $param = [
            'format' => 'json',
            'devIndex' => $devIndex,
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //获取门禁设备的工作状态。。
    public function getAcWorkStatus(string $devIndex)
    {
        $endpoint = '/ISAPI/AccessControl/AcsWorkStatus?format=json&devIndex=' . $devIndex;
        $param = [
            'format' => 'json',
            'devIndex' => $devIndex,
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //远程控制门常开、门常闭、门关和门闭状态。。。
    //请求 URI 中的<ID>指门编号，其值范围从 1 到 65535。当值为 65535 时，代表所有门。
    public function remoteControl($id, string $devIndex, string $cmd)
    {
        $endpoint = '/ISAPI/AccessControl/RemoteControl/door/' . $id . '?format=json&devIndex=' . $devIndex;
        $param = [
            'RemoteControlDoor' => [
                'cmd' => $cmd,
            ],
        ];
        return $this->doHttpReuqest('PUT', $endpoint, $param);
    }

    //获取门参数。
    public function getAcDoorParams($doorId, string $devIndex)
    {
        $endpoint = '/ISAPI/AccessControl/Door/param/' . $doorId . '?format=json&devIndex=' . $devIndex;
        $param = [
            'format' => 'json',
            'devIndex' => $devIndex,
        ];
        return $this->doHttpReuqest('GET', $endpoint, $param);
    }

    //设置门参数。。
    public function setAcDoorParams($doorId, string $devIndex, string $doorName)
    {
        $endpoint = '/ISAPI/AccessControl/Door/param/' . $doorId . '?format=json&devIndex=' . $devIndex;
        $param = [
            'doorName' => $doorName,
        ];
        return $this->doHttpReuqest('PUT', $endpoint, $param);
    }

    /**
     * ====================================================
     *  历史事件
     * ====================================================.
     */
    //门禁设备历史事件查询
    public function getAcEvent(string $devIndex, array $params)
    {
        $endpoint = '/ISAPI/AccessControl/AcsEvent?format=json&devIndex=' . $devIndex;
        $param = [
            'AcsEventCond' => $params,
        ];
        return $this->doHttpReuqest('POST', $endpoint, $param);
    }
}
