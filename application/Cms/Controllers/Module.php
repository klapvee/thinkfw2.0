<?php

namespace APP\Cms\Controllers;

use Thinkfw\Controller\Front;
use Thinkfw\Application;
use Thinkfw\Xml;

use APP\Cms\Forms\Module as ModuleForm;
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

        $this->view->moduleId = (int) $module['id'];
        $this->view->name = $module['name'];
        $this->view->data = $data;

        $xml = new Xml($module['definition']);
        $this->view->definition = $xml->getData();
    }

    public function add()
    {
        $id = $this->getParam(3);

        $module = $this->model->getModule($id);
        $xml = new Xml($module['definition']);

        $form = new ModuleForm;
        $form->init($xml->getData());

        if (!empty($_POST)) {

            // set the parameters in the form
            $form->setParameters($this->getParams());

            // do validation check
            if ( $form->validate() === true) {

                $this->model->insertRecord($xml->getData(), $module, $_POST);
                Application::redirect('/module/overview/'.$id);
            }
        }



        $this->view->form = $form->render();

        $this->view->moduleId = (int) $module['id'];
        $this->view->name = $module['name'];

        $this->view->data = $xml->getData();
    }

    public function edit()
    {
        $moduleId = $this->getParam(3);
        $id = $this->getParam(4);

        $module = $this->model->getModule($moduleId);
        $xml = new Xml($module['definition']);

        if (!empty($_POST)) {
            $this->model->updateRecord($xml->getData(), $module, $_POST, $id);
        }

        $this->view->data = $this->model->getRecord($module, $id);
        $this->view->xml = $xml->getData();
    }
}