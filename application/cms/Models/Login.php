<?php

namespace APP\Cms\Models;

class Login
{
    private $database;

    public function setDatabase(\Thinkfw\Db\Adapters\Database $database)
    {
        $this->database = $database;
    }

    public function login($username, $password)
    {
        $this->database->query("test");
    }
}
