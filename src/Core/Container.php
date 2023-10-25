<?php

declare(strict_types=1);
/**
 * This file is part of Kuaijing Bailing.
 *
 * @link     https://www.kuaijingai.com
 * @document https://help.kuaijingai.com
 * @contact  www.kuaijingai.com 7*12 9:00-21:00
 */
namespace Fastwhal\HikDeviceGateway\Core;

class Container implements \ArrayAccess
{
    public $register;

    /**
     * 中间件.
     *
     * @var array
     */
    protected $middlewares = [];

    /**
     * @var array
     */
    private $instances = [];

    /**
     * @var array
     */
    private $values = [];

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * @param mixed $offset
     *
     * @return $this|mixed
     */
    public function offsetGet($offset)
    {
        if (isset($this->instances[$offset])) {
            return $this->instances[$offset];
        }

        $raw = $this->values[$offset];
        $value = $this->values[$offset] = $raw($this);
        $this->instances[$offset] = $value;

        return $value;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->values[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    /**
     * 注册服务
     *
     * @param mixed $provider
     * @return $this
     */
    public function serviceRegsiter($provider)
    {
        $provider->serviceProvider($this);

        return $this;
    }

    /**
     * 获取中间件.
     */
    public function getMiddlewares()
    {
        return $this->middlewares;
    }

    /**
     * 设置中间件.
     */
    public function setMiddlewares(array $middlewares)
    {
        $this->middlewares = $middlewares;
    }

    /**
     * 添加中间件.
     *
     * @param string $name
     *
     * @return array
     */
    public function addMiddlewares(array $classFun, $name = '')
    {
        if (empty($this->middlewares)) {
            $this->middlewares[$name] = $classFun;
        } else {
            array_push($this->middlewares, [$name => $classFun]);
        }

        return $this->middlewares;
    }
}
