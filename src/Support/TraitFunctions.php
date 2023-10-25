<?php

declare(strict_types=1);
/**
 * This file is part of Kuaijing Bailing.
 *
 * @link     https://www.kuaijingai.com
 * @document https://help.kuaijingai.com
 * @contact  www.kuaijingai.com 7*12 9:00-21:00
 */
namespace Fastwhal\HikDeviceGateway\Support;

trait TraitFunctions
{
    public function getDigestVal($rsp, $getName)
    {
        $tmp = "{$getName}=\"";
        $pos = strpos($rsp, $tmp);
        if ($pos == -1) {
            return false;
        }
        $pos += strlen($tmp);
        $rsp = substr($rsp, $pos, strlen($rsp) - $pos);

        $pos = strpos($rsp, '"');
        if ($pos == -1) {
            return false;
        }
        return substr($rsp, 0, $pos);
    }

    public function nc($nc = 1)
    {
        return str_pad(dechex($nc), 8, '0', STR_PAD_LEFT);
    }

    public function cnonce()
    {
        return str_replace('.', '', uniqid('', true));
    }
}
