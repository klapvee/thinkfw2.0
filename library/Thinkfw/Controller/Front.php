<?php

namespace Thinkfw\Controller;
use Thinkfw\View as View;

abstract class Front
{
    public $view;

    public $layout;

    public $params;

    public function __construct()
    {
        $this->view = new View;
        $this->layout = 'default.phtml';

        foreach ($_POST as $key => $value)
        {
            $this->params[$key] = $value;
        }

        foreach ($_GET as $key => $value)
        {
            $this->params[$key] = $value;
        }

        $parts = explode('/', $_SERVER['REQUEST_URI']);

        foreach ($parts as $part)
        {
            $this->params['request'][] = $part;
        }
    }

    public function getView()
    {
        return $this->view;
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * Gets a param from the param stack
     *
     * @param string|int $index
     * @return string
     */
    public function getParam($index)
    {
        $value = '';

        if (is_numeric($index)) {
            if (isset($this->params['request'][$index])) {
                $value = $this->params['request'][$index];
            }
        } else {
            if (isset($this->params[$index])) {
                $value = $this->params[$index];
            }
        }

        return $value;
    }
}
