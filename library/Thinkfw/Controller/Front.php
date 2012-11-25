<?php

namespace Thinkfw\Controller;
use \Thinkfw\View as View;

abstract class Front
{
    public $view;

    public function __construct()
    {
        $this->view = new View;
    }

}
