<?php

/**
 * Thinkfw\Application\Bootstrap
 *
 * The bootstrapper for the application
 *
 * @package Thinkfw
 * @subpackage Bootstrap;
 * @author WillemDaems
 *
 * @todo put contents of view directly in layout
 *
 */

namespace Thinkfw\Application;

//use \Front\Cms\Controllers as Controllers;

class Bootstrap
{

    /**
     * Array containing configuration
     * options from ini file
     *
     * @var array
     */
    public static $config;

    /**
     * Thinkfw\Application
     *
     * @var \Thinkfw\Application
     */
    public static $application;

    /**
     *
     * @var \Thinkfw\AbstractController
     */
    public static $controller;

    /**
     *
     * @var type
     */
    public static $router;


    /**
     * Run
     *
     * Accepts __NAMESPACE__ Application objects
     * @param \Thinkfw\Application $application
     * @return void
     */
    public static function run(\Thinkfw\Application $application)
    {
        // new router object
        self::$router = new \Thinkfw\Router();

        // set a new application
        self::$application = $application;

        // get parsed config object
        self::$config = new \Thinkfw\Config('/application/Config/site.ini');

        // tell the application to start
        self::$application->run();

        // get controller and action
        $controllerName = self::getFrontControllerName();

        // init a new controller corresponding to request
        self::$controller = new $controllerName;

        // start object output caching
        ob_start();

        // perform the action corresponding to request
        self::$controller->Action();

        // get the base for default view base dir
        $ViewDir = strtolower(self::$router->getFrontBase());

        // get the default view file to display
        $ViewFile = strtolower(self::$router->getFrontAction());

        // set view location from which the view will be loaded from
        self::$controller->view->setViewLocation('Cms/Views/html/'.$ViewDir.'/'.$ViewFile.'.phtml');

        // render and return the html output from the view
        $content = self::$controller->view->render();

        // require the targeted layout
        require 'layouts/'.self::$controller->getLayout();

        // parse the layout html
        $content = ob_get_contents();

        // add the view contents
        $content .= $view;

        // clean
        ob_end_clean();

        echo $content;
    }

    /**
     * boot
     *
     *
     * @return void;
     *
     */
    public function boot()
    {
        // start session
        @session_start();


    }

    /**
     * getFrontControllerName
     *
     * @return string
     */
    public function getFrontControllerName()
    {
        // APP namespace
        return '\APP\Cms\Controllers\\' . self::$router->getFrontBase();
    }


    public function getDatabase() {

    }

    public static function getConfig()
    {
        return self::$config;
    }
}