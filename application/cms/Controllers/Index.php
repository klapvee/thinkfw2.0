<?php

namespace Front\Controllers;

use Thinkfw\Controller\Front as Front;
use Thinkfw\Application\Bootstrap as Bootstrap;

class Index extends Front
{
    public function action()
    {
        echo Bootstrap::getDatabase();
    }
}