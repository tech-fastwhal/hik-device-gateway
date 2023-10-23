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

use Fastwhal\HikDeviceGateway\Exceptions\Exception;
use Fastwhal\HikDeviceGateway\StatusCodeErrMsg;
use Fastwhal\HikDeviceGateway\Support\TraitFunctions;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Utils;
use function GuzzleHttp\Psr7\try_fopen;

trait Client
{
    use AuthService;
    use TraitFunctions;

    public static $client;

    protected static $appConfig = [];

    //是否包含图片地址
    public $hasBindImgUrl =  false;
    public $imageUrl = '';

    public function httpClient()
    {
        if (! self::$client) {
            self::$client = new Http();
            self::$client->setUrl($this->baseUri);
        }

        return self::$client;
    }

    public function setImageUrl(string $imageUrl)
    {
        $this->imageUrl = $imageUrl;
        $this->hasBindImgUrl = true;
        return $this;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function dump($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }

    public static function setAppConfig($appConfig)
    {
        self::$appConfig = $appConfig;
    }

    /**
     * 云牟配置项获取.
     *
     * @return mixed
     */
    public static function getAppConfig()
    {
        return self::$appConfig;
    }

    public static function getAllConfig()
    {
        return self::$appConfig;
    }

    
    /**
     * @param string $httpMetod HTTP请求方法
     * @param string $endpoint URI
     * @param array $params 请求参数，默认为空
     * @param array $headers header头参数
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function doHttpReuqest(string $httpMetod,string $endpoint,array $params =[],array $headers=[])
    {
        $this->dump(['$endpoint'=>$endpoint,'发送请求参数'=>json_encode($params)]);
        try {
            $config = self::getAppConfig();
            $baseUri = $config['protocol'] . '://' . $config['host'] . ':' . $config['port'];
            $client = new \GuzzleHttp\Client(['base_uri' => $baseUri,'timeout'=>30]);
            $options = [
                'headers' => $headers,
                'json'=>$params
            ];
            if (strtolower($httpMetod) === 'get'){
                $options['query'] = $params;
            }

            if ($this->hasBindImgUrl){
                $multipart = [
                    [
                        'name' => 'data',
                        'contents' => \json_encode($params),
                        'headers'=>[
                            'Content-Type'=>'application/json'
                        ]
                    ],
                    [
                        'name' => 'FaceDataRecord',
                        'contents' =>  file_get_contents($this->getImageUrl()),
                        'filename' => basename($this->getImageUrl()),
                        'headers'=>[
                            'Content-Disposition'=>'form-data',
//                            'Content-Type'=>'image/jpeg'
                        ]
                    ],
                ];
                $options = [
                    'headers' => $headers,
                    'multipart'=>$multipart,
                ];

            }

            $response = $client->request($httpMetod, $endpoint,$options );
            $response = $this->unwrapResponse($response);

        } catch (BadResponseException $exception) {
            $serverResponse = $exception->getResponse();
            $request = $exception->getRequest();
            $statusCode = $serverResponse->getStatusCode();
            if ($statusCode === 401) {
                $challenge = $serverResponse->getHeaderLine('WWW-Authenticate');
                $qop = $this->getDigestVal($challenge, 'qop'); // 服务器返回
                $realm = $this->getDigestVal($challenge, 'realm'); // 服务器返回
                $nonce = $this->getDigestVal($challenge, 'nonce'); // 服务器返回

                $username = $config['username'];
                $password = $config['password'];
                $nc = $this->nc();
                $cnonce = $this->cnonce();
                $A1 = md5($username . ':' . $realm . ':' . $password);
                $method = $request->getMethod();
                $uri = $request->getUri()->getPath();
                $A2 = md5($method . ':' . $uri);
                $authResponse = md5($A1 . ':' . $nonce . ':' . $nc . ':' . $cnonce . ':' . $qop . ':' . $A2);
                $digestHeaderLine = 'Digest ';
                $digestHeaderLine .= 'username="' . $username . '"';
                $digestHeaderLine .= ', realm="' . $realm . '"';
                $digestHeaderLine .= ', nonce="' . $nonce . '"';
                $digestHeaderLine .= ', uri="' . $uri . '"';
                $digestHeaderLine .= ', cnonce="' . $cnonce . '"';
                $digestHeaderLine .= ', qop="' . $qop . '"';
                $digestHeaderLine .= ', nc=' . $nc . '';
                $digestHeaderLine .= ', response="' . $authResponse . '"';
                $request = $request->withHeader('Authorization', $digestHeaderLine);
                $newResponse = $client->send($request);
                $response = $this->unwrapResponse($newResponse);

            }

        }
        return $response;
    }



    public function geTimeStamp()
    {
        [$msec, $sec] = explode(' ', microtime());
        return (float) sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    }

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
