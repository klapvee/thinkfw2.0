<?php

namespace Thinkfw\Db\Adapters;

use Thinkfw\Db\Adapters\Database;

class Mysql extends Database
{
    private $connection;

    private $username;

    private $password;

    private $database;

    public function __construct($host, $username, $password, $database)
    {
        $this->username = $username;
        $this->host = $host;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
    }

    public function connect()
    {
        $this->connection = mysql_connect($this->host, $this->username, $this->password);

        if (!$this->connection) {
            echo "connection failed";
        }

        if (!mysql_select_db($this->database, $this->connection) ) {
            echo mysql_error();
            exit;
        }
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

    public function fetchAll($select) {

    }

    public function fetchRow($select)
    {
        return mysql_fetch_assoc($select);
    }

    public function query($string) {
       return mysql_query($string);
    }

    public function identify()
    {
        echo "hello im mysql";
    }
}