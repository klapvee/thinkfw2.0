<?php

namespace APP\Cms\Controllers;

use Thinkfw\Controller\Front;
use Thinkfw\Application;
use Thinkfw\Xml;

use APP\Cms\Models\Module as ModuleModel;

class Module extends Front
{
    private $db;

    private $model;

    public function init()
    {
        $this->db = Application::getDatabase();
        $this->model = new ModuleModel;
        $this->model->setDatabase($this->db);
    }
    public function Action()
    {

    }

    public function overview()
    {
        $id = $this->getParam(3);
        $module = $this->model->getModule($id);
        $data = $this->model->getData($module);

        $this->view->id = (int) $module['id'];
        $this->view->name = $module['name'];
        $this->view->data = $data;

        $xml = new Xml($module['definition']);
        $this->view->definition = $xml->getData();
    }

    public function add()
    {
        $id = $this->getParam(3);

        $module = $this->model->getModule($id);
        $data = $this->model->getData($module);

        $xml = new Xml($module['definition']);

        if (!empty($_POST)) {

            $this->model->insertData($xml->getData(), $module, $_POST);
            Application::redirect('/module/overview/'.$id);
        }

        $this->view->id = (int) $module['id'];
        $this->view->name = $module['name'];

        $this->view->data = $xml->getData();
    }
}