<?php

declare(strict_types=1);
/**
 * This file is part of Kuaijing Bailing.
 *
 * @link     https://www.kuaijingai.com
 * @document https://help.kuaijingai.com
 * @contact  www.kuaijingai.com 7*12 9:00-21:00
 */
namespace Fastwhal\HikDeviceGateway\Http;

use GuzzleHttp\Client as HttpClient;

class Http
{
    protected $guzzleOptions = [];

    protected $baseUri = ''; //正式环境

    public function request($method, $endpoint, $options = [])
    {
        return $this->unwrapResponse($this->getHttpClient()->{$method}($endpoint, $options));
    }

    /**
     * 用户可以自定义 guzzle 实例的参数.
     */
    public function setGuzzleOptions(array $options = [])
    {
        $this->guzzleOptions = $options;
    }

    public function setUrl($url)
    {
        $this->baseUri = trim($url, '/') . '/';

        return $this;
    }

    protected function getHttpClient()
    {
        $config = Client::getAppConfig();
        if (! isset($config['port'])) {
            $config['port'] = 80;
        }
        $this->baseUri = $config['protocol'] . '://' . $config['host'] . ':' . $config['port'];
        $this->guzzleOptions['base_uri'] = $this->baseUri;
        return new HttpClient($this->guzzleOptions);
    }

    /**
     * 统一转换响应结果为 json 格式.
     *
     * @param $response
     */
    protected function unwrapResponse($response)
    {
        $contentType = $response->getHeaderLine('Content-Type');
        $contents = $response->getBody()->getContents();
        if (stripos($contentType, 'json') !== false || stripos($contentType, 'javascript')) {
            return json_decode($contents, true);
        }
        if (stripos($contentType, 'xml') !== false) {
            return json_decode(json_encode(simplexml_load_string($contents)), true);
        }

        return $contents;
    }
}
