<?php

namespace Thinkfw;

class Db
{
    private $adapter;

    public function __construct($adapter, $host, $username, $password)
    {

        $adapterName = '\Thinkfw\Db\Adapters\\'.ucfirst($adapter);
        $this->adapter = new $adapterName();

        echo $this->adapter->identify();
    }
}