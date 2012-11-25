<?php

namespace Thinkfw\Db\Adapters;

interface IAdapter
{
    public function connect();
    public function query();
    public function escape($string);
    public function fetchRow();
    public function fetchAll();
}