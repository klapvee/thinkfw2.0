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

class Application
{
    /**
     *
     * @var \Thinkfw\Db
     */
    private $db;

    /**
     * run
     *
     * Runs the current application
     *
     * @return void;
     */
    public function run()
    {
        echo $this->getDatabase();
    }

    public function getDatabase()
    {
        echo "<pre>";
        $config = \Thinkfw\Application\Bootstrap::getConfig();

        if ($this->db === null) {


            $this->db = new \Thinkfw\Db(
                $config->get('database', 'driver'),
                $config->get('database', 'host'),
                $config->get('database', 'username'),
                $config->get('database', 'password'),
                $config->get('database', 'db')
            );
        }
    }
}