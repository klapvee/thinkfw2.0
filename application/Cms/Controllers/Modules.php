<?php


namespace APP\Cms\Controllers;

use Thinkfw\Controller\Front;
use Thinkfw\Application;
use APP\Cms\Models\Module as ModuleModel;


class Modules extends Front
{
    private $db;

    private $model;

    public function init() {
        $this->db = Application::getDatabase();
        $this->model = new ModuleModel;
        $this->model->setDatabase($this->db);
    }

    public function action()
    {
        $this->view->modules = $this->model->getModules();
    }

    public function Add()
    {
        if (!empty($_POST)) {

            if (!empty($_POST['name']) && !empty($_POST['table']) && !empty($_POST['definition'])) {

                $success = $this->model->addModule($_POST['name'], $_POST['table'], $_POST['definition']);
                if ($success === true) {
                    Application::redirect('/modules');
                }
            }
        }
    }

    public function edit()
    {

        $id = (int) $this->getParam(3);
        $name = $this->getParam('name');
        $table = $this->getParam('table');
        $definition = $this->getParam('definition');

        $module = $this->model->getModule($id);
        $this->view->definition = $module['definition'];
        $this->view->name = $module['name'];
        $this->view->table = $module['table'];
        $this->view->id = $module['id'];

        if (!empty($_POST)) {

            if (!empty($name) && !empty($table) && !empty($definition)) {

                $success = $this->model->updateModule($id, $name, $table, $definition);
                if ($success === true) {
                    Application::redirect('/modules');
                }
            }
        }
    }
}