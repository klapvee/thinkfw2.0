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
    private $application;

    /**
     * Constructor
     *
     * Accepts __NAMESPACE__ Application objects
     * @param \Thinkfw\Application $application
     * @return void
     */

    public function __construct(\Thinkfw\Application $application)
    {
        $this->application = $application;
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

        self::$config = new \Thinkfw\Config('/application/Config/site.ini');
        $this->application->run();
    }

    public static function getConfig()
    {
        return self::$config;
    }
}