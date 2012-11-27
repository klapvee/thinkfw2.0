<?php

/**
 * \Thinkfw\Application
 *
 * The application
 *
 * @package Thinkfw
 * @subpackage Application
 *
 */
namespace Thinkfw;

use Thinkfw\Db;
use Thinkfw\Application\Bootstrap;

class Application
{
    /**
     *
     * @var \Thinkfw\Db
     */
    public static $db;

    /**
     * run
     *
     * Runs the current application
     *
     * @return void;
     */
    public function run()
    {
        $this->getDatabase();
    }

    public static function getDatabase()
    {
        $config = Bootstrap::getConfig();

        if (self::$db === null) {
            self::$db = new Db (
                $config->get('database', 'driver'),
                $config->get('database', 'host'),
                $config->get('database', 'username'),
                $config->get('database', 'password'),
                $config->get('database', 'db')
            );
        }

        return self::$db->getAdapter();
    }

    public function redirect($url)
    {
        header("Location: " . $url);
        exit;
    }
}