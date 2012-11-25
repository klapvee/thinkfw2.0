<?php

namespace Thinkfw\Db\Adapters;


class Mysql implements IAdapter
{
    private $connection;

    public function __construct()
    {

    }

    public function connect()
    {
        mysql_connect($this->host, $this->username, $this->password);
    }

    /**
     * escape
     *
     * Escaping function for variables
     *
     * @param string $var
     * @return string
     */
    public function escape($string) {
        $var = mysql_real_escape_string($string);
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