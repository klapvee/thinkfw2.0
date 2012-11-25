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
 */

namespace Thinkfw\Application;

use \Front\Controllers as Controllers;

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
     * Run
     *
     * Accepts __NAMESPACE__ Application objects
     * @param \Thinkfw\Application $application
     * @return void
     */
    public static function run(\Thinkfw\Application $application)
    {


        self::$application = $application;

        self::$config = new \Thinkfw\Config('/application/Config/site.ini');
        self::$application->run();
        self::$controller = new Controllers\Index;

        ob_start();


        self::$controller->Action();

        $content = ob_get_contents();

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

    public function getDatabase() {

    }
    
    public static function getConfig()
    {
        return self::$config;
    }
}