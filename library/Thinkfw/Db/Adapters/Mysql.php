<?php

namespace Thinkfw\Db\Adapters;

class Mysql implements IAdapter
{
    public function __construct()
    {

    }

    public function connect()
    {

    }

    /**
     * escape
     *
     * Escaping function for variables
     *
     * @param string $var
     * @return string
     */
    public function escape($var) {
        $var = mysql_real_escape_string($var);
        return $var;
    }

    public function fetchAll() {

    }

    public function fetchRow() {

    }

    public function query() {

    }

    public function identify()
    {
        echo "hello im mysql";
    }
}