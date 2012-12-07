<?php

namespace Thinkfw;

class Xml
{
    private $xml;

    public function __construct($xml)
    {
        $this->xml = new \SimpleXMLElement($xml);
        return $this;
    }

    public function getData()
    {
        return $this->xml;
    }
}
