<?php

namespace Bbsnly\ChartJs\Config;

class Config implements ConfigInterface
{
    /**
     * @var array
     */
    protected $attributes;

    /**
     * Config constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->attributes[$name];
    }

    /**
     * @param $name
     * @param $value
     *
     * @return $this
     */
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;

        return $this;
    }

    /**
     * @param $name
     * @param $value
     *
     * @return $this
     */
    public function __call($name, $value)
    {
        return $this->__set($name, reset($value));
    }

    /**
     * Generates an array of configuration options
     *
     * @return array
     */
    public function toArray()
    {
        array_walk_recursive($this->attributes, function (&$item) {
            if (is_object($item)) {
                $item = $item->toArray();
            }
        });

        return $this->attributes;
    }
}
