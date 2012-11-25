<?php

namespace Thinkfw;


class Db
{
    private $adapter;

    public function __construct($adapter, $host, $username, $password)
    {
        try {
            $adapterName = '\Thinkfw\Db\Adapters\\'.ucfirst($adapter);

            $this->adapter = new $adapterName(
                    $host,
                    $username,
                    $password
                );
        } catch (Exception $e) {
            echo "Database instantiation failed: " . $e->getMessage();
        }

        return $this->adapter;
    }
}