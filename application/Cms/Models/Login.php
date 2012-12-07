<?php

/**
 *
 * @todo session management
 */
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
        $result = $this->database->query("
            SELECT * FROM thinkfw_users WHERE username = '".$this->database->escape($username)."'
                AND `password` = MD5(CONCAT('".$this->database->escape($password) ."', salt))
        ");

        $row = $this->database->fetchRow($result);
        $_SESSION['user'] = $row;
        $_SESSION['user']['admin'] = (bool) $row['admin'];
        
        if (!empty($row['username'])) {
            return true;
        } else {
            return false;
        }
    }
}
