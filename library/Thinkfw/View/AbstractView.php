<?php

namespace Thinkfw\View;

abstract class AbstractView
{
    public function __construct()
    {

    }
    public function __get($name)
    {
        return $name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}