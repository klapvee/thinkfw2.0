<?php

namespace APP\Cms\Controllers;

use Thinkfw\Controller\Front;
use Thinkfw\Application\Bootstrap;

class Login extends Front
{
    public function action()
    {
        $this->setLayout('login.phtml');
    }
}