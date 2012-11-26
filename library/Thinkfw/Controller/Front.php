<?php

namespace Thinkfw\Controller;
use Thinkfw\View as View;

abstract class Front
{
    public $view;

    public $layout;

    public function __construct()
    {
        $this->view = new View;
        $this->layout = 'default.phtml';
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function getLayout()
    {
        return $this->layout;
    }
}
