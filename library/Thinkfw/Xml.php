<?php

namespace Thinkfw;

class Xml
{
    private $xml;

    public function __construct($xml)
    {
        // disable loading externals
        $old = libxml_disable_entity_loader(true);

        $this->xml = new \SimpleXMLElement($xml);

        // set the old value
        libxml_disable_entity_loader($old);
        
        return $this;
    }

    public function getData()
    {
        return $this->xml;
    }
}
