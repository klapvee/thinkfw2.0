<?php

namespace Front\Cms\Controllers;

use Thinkfw\Controller\Front as Front;
use Thinkfw\Application\Bootstrap as Bootstrap;

class Login extends Front
{
    public function action()
    {
        $this->setLayout('login.phtml');
    }
}