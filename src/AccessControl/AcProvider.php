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
use Fastwhal\HikDeviceGateway\Core\Container;
use Fastwhal\HikDeviceGateway\Interfaces\Provider;

/**
 * @AcProvider 访问控制
 *
 * 人员管理
 * @method addUsers(string $devIndex,array $params)
 * @method updateUser(string $devIndex,array $params)
 * @method getUserCount(string $devIndex)
 * @method searchUserInfo(string $devIndex,array $params)
 * @method deleteUser(string $devIndex,array $params)
 * @method getDeleteUserProcess(string $devIndex)
 *
 * 卡管理
 * @method addCard(string $devIndex,array $params)
 * @method updateCard(string $devIndex,array $params)
 * @method deleteCard(string $devIndex,array $params)
 * @method getCardCount(string $devIndex)
 * @method searchCard(string $devIndex,array $params)
 *
 * 人脸管理
 * @method addFaceData(string $devIndex,array $params,string $imgeUrl)
 * @method deleteFaceData(string $devIndex,array $params)
 * @method getFaceCount(string $devIndex)
 * @method searchFace(string $devIndex,array $params)
 *
 * 管理指纹信息
 * @method getFingerPrintCfg(string $devIndex)
 * @method getCardReaderCfg(string $id,string $devIndex)
 * @method addFingerPrint(string $devIndex,array $params)
 * @method getFingerPrintProgress(string $devIndex)
 * @method updateFingerPrint(string $devIndex,array $params)
 * @method captureFingerPrint(string $devIndex,array $params)
 * @method getFingerPrint(string $devIndex,array $params)
 * @method deleteFingerPrint(string $devIndex)
 * @method getDeleteFingerPrint(string $devIndex)
 * @method getDeleteFingerPrintProgress(string $devIndex)
 *
 * 远程控制门
 * @method getAcCapabilities(string $devIndex)
 * @method getAcWorkStatus(string $devIndex)
 * @method remoteControl($id,string $devIndex,string $cmd)
 * @method getAcDoorParams($doorId,string $devIndex)
 * @method setAcDoorParams($doorId,string $devIndex,string $doorName)
 *
 * 历史事件
 * @method getAcEvent(string $devIndex,array $params)
 *
 */
class AcProvider implements Provider{
    public function serviceProvider(Container $container)
    {
        $container['Ac'] = function ($container){
          return new Ac($container);
        };
    }
}