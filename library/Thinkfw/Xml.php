<?php
/**
 * Xml.php
 *
 * Provides a simple wrapper for SimpleXmlElements
 *
 * @package Thinkfw
 * @subpackage Wrappers
 */
namespace Thinkfw;

class Xml
{
    /**
     * SimpleXMLElement Object
     *
     * @var SimpleXMLElement
     */
    private $xml;

    /**
     * create new SimpleXMLElement from given xml
     *
     * @param string $xml
     * @return \Thinkfw\Xml
     */
    public function __construct($xml)
    {
        // disable loading externals
        $old = libxml_disable_entity_loader(true);

        // parse and return the xml
        $this->xml = new \SimpleXMLElement($xml);

        // set the old value
        libxml_disable_entity_loader($old);

        return $this;
    }

    /**
     * Getter for XMLElement
     *
     * @return SimpleXMLElement
     */
    public function getData()
    {
        return $this->xml;
    }
}
