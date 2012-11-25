<?php

namespace Thinkfw;

class Router
{
    private $base;

    private $action;

    private $uri;

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];

        // chop the slash if necessary
        if (substr($this->uri, 0, 1) === '/') {
            $this->uri = substr($this->uri, 1, strlen($this->uri));
        }

        $parts = explode("/", $this->uri);

        if (empty($parts[0])) {
            $parts[0] = 'Index';
        }

        if (empty($parts[1])) {
            $parts[1] = 'Index';
        }

        $this->base = ucfirst($parts[0]);
        $this->action = ucfirst($parts[1]);

        //

        //return $controllerName;
    }

    public function getFrontBase()
    {
        return $this->base;
    }

    public function getFrontAction()
    {
        return $this->action;
    }
}