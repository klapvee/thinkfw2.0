<?php

namespace Thinkfw\Db\Adapters;

interface IAdapter
{
    public function connect();
    public function query($string);
    public function escape($string);
    public function fetchRow($select);
    public function fetchAll($select);
}