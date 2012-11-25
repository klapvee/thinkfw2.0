<?php

namespace Front\Cms\Controllers;

use Thinkfw\Controller\Front as Front;
use Thinkfw\Application\Bootstrap as Bootstrap;

class Index extends Front
{
    public function action()
    {

        $this->view->test = 2;
        //echo Bootstrap::getDatabase();
    }
}