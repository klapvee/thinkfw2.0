<?php

    // start the profile timer
    $timerProfileStart = time() + microtime();

    ini_set('display_errors', 'on');
    error_reporting(E_ALL);


    define('APPLICATION_PATH', realpath($_SERVER['DOCUMENT_ROOT'] . '/../application'));
    define('BASE_PATH', realpath($_SERVER['DOCUMENT_ROOT'] . '/../' ));

    set_include_path(get_include_path() . PATH_SEPARATOR . APPLICATION_PATH);
    set_include_path(get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/Controllers');
    set_include_path(get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/Models');
    set_include_path(get_include_path() . PATH_SEPARATOR . BASE_PATH . '/library');

    require BASE_PATH . '/library/Thinkfw/Autoloader.php';

    spl_autoload_register('\Thinkfw\Application\Autoloader::autoload');

    $application = new \Thinkfw\Application();

    $boot = new \Thinkfw\Application\Bootstrap($application);
    $boot->boot();
    