<?php
namespace APP\Cms\Controllers;

use Thinkfw\Application\Bootstrap as Bootstrap;
use APP\Cms\Models\Login as LoginModel;

class Login extends \Thinkfw\Controller\Front
{
    public function action()
    {

        if (!empty($_POST)) {

            $arr = array('success'=>true);
            echo json_encode($arr);
            exit;
            // if xhr call
            // echo json and return
        }

        $this->setLayout('login.phtml');
    }
}