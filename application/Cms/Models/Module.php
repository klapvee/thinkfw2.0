<?php

/**
 *
 * @todo session management
 */
namespace APP\Cms\Models;


class Module
{
    private $database;

    public function setDatabase(\Thinkfw\Db\Adapters\Database $database)
    {
        $this->database = $database;
    }

    /**
     * get all modules actived
     *
     * @return array
     */
    public function getModules()
    {
        $array = array();

        $result = $this->database->query("
            SELECT * FROM thinkfw_modules ORDER BY name");

        $resultSet = $this->database->fetchAll($result);

        if ($resultSet !== false) {
            $array = $resultSet;
        }

        return $array;

    }

    /**
     * Get module definition
     *
     * @param int $id
     * @return array
     */
    public function getModule($id)
    {
        $result = $this->database->query("
            SELECT * FROM thinkfw_modules WHERE id = '". (int) $id ."'
        ");

        return $this->database->fetchRow($result);
    }

    /**
     *
     * insert new module definition with xml schema into db
     *
     * @param string $name
     * @param string $table
     * @param string $definition
     * @return boolean
     */
    public function addModule($name, $table, $definition)
    {

        $success = $this->database->query("
            INSERT INTO
                thinkfw_modules
            SET
                `name` = '".$this->database->escape($name)."',
                `table` = '" . $this->database->escape($table) . "',
                `definition` = '".$this->database->escape($definition)."'
        ");

        return $success;
    }

    /**
     * Updates module definition
     * 
     * @param int $id
     * @param string $name
     * @param string $table
     * @param string $definition
     * @return boolean
     */
    public function updateModule($id, $name, $table, $definition)
    {
        $success = $this->database->query("
            UPDATE
                thinkfw_modules
            SET
                `name` = '".$this->database->escape($name)."',
                `table` = '" . $this->database->escape($table) . "',
                `definition` = '".$this->database->escape($definition)."'
            WHERE id = '".(int)$id."'
        ");

        return $success;
    }
}
