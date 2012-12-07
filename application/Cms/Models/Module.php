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
     * Fetch table data
     *
     * @param array $module
     * @return array
     */
    public function getData(array $module)
    {
        if (!preg_match("/[A-Za-z\_]/", $module['table'])) {
            echo "table name did not meet specifications!";
            exit;
        }

        $result = $this->database->query("
            SELECT * FROM `" . $module['table'] . "`
        ");

        $resultSet = array();

        if ($result !== false) {
            $resultSet = $this->database->fetchAll($result);
        }

        return $resultSet;
    }

    public function getRecord($module, $id)
    {
        $result = $this->database->query("
            SELECT * FROM `".$this->database->escape($module['table'])."`
            WHERE id = '".(int) $id ."'
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

    /**
     * Insert new record based on (post) data and xml definition
     *
     * @param \SimpleXMLElement $xml
     * @param array $module
     * @param array $values
     * @return void;
     */
    public function insertRecord(\SimpleXMLElement $xml, array $module, array $values)
    {
        $query = 'INSERT INTO `' . $this->database->escape($module['table']) . '` SET ';
        $count = count($xml->fields->field);

        $i = 0;
        foreach ($xml->fields->field as $field) {
            $i++;

            $arr = $field->attributes();
            $name = (string) $arr['name'];

            $query .= '`' . $name . '` = \'' . $this->database->escape($values[$name]) . "'";
            if ($i < $count) {
                $query .= ', ';
            }
        }

        return mysql_query($query);

    }

    public function updateRecord(\SimpleXMLElement $xml, array $module, array $values, $id)
    {
        $query = 'UPDATE `' . $this->database->escape($module['table']) . '` SET ';
        $count = count($xml->fields->field);

        $i = 0;
        foreach ($xml->fields->field as $field) {
            $i++;

            $arr = $field->attributes();
            $name = (string) $arr['name'];

            $query .= '`' . $name . '` = \'' . $this->database->escape($values[$name]) . "'";
            if ($i < $count) {
                $query .= ', ';
            }
        }

        $query .= " WHERE id = '".(int) $id."'";

        return mysql_query($query);

    }
}
