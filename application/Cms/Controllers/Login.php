<?php

/**
 *
 * @todo header function
 */

namespace APP\Cms\Controllers;

use Thinkfw\Controller\Front;
use Thinkfw\Application;
use APP\Cms\Models\Login as LoginModel;


class Login extends Front
{
    private $db;

    private $model;

    public function init() {
        $this->db = Application::getDatabase();
        $this->model = new LoginModel;
        $this->model->setDatabase($this->db);
    }

    public function action()
    {
        if (!empty($_POST['username'])) {
            $success = $this->model->login($_POST['username'], $_POST['password']);
            if ($success) {
                header('Location: /');
                exit;
            }
        }

        $this->setLayout('login.phtml');
    }
}