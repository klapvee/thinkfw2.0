<?php

namespace Thinkfw\Form;

/**
 * Form element object
 * Holder for form objects to be rendered
 *
 * @package Thinkfw
 * @subpackage Forms
 * @author WillemDaems
 *
 */
class Element
{
    /**
     * Type: text, textarea, select. hidden, etc
     * @var string
     */
    private $type;

    /**
     * Name value
     * @var string
     */
    private $name;

    /**
     * Value for the input
     * @var string
     */
    private $value;

    /**
     * Label for the input element
     * @var string
     */
    private $label;

    /**
     * Required in form
     *
     * @var boolean
     */
    private $required;

    /**
     * Show in form overview
     *
     * @var boolean
     */
    private $inOverview;

    /**
     * Creates a new element
     *
     * @param string $type
     * @param string $name
     * @param string $label
     * @param string $value
     * @param bool $required
     * @param bool $inOverview
     * @return void
     */
    public function __construct($type, $name, $label = '', $value = '', $required = false, $inOverview = true)
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->required = $required;
        $this->inOverview = $inOverview;
    }

    /**
     * returns name
     *
     * @return string
     */
    public function getName()
    {
        return (string) $this->name;
    }

    /**
     * returns type
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * returns value
     * @return string
     */
    public function getValue()
    {
        return (string) $this->value;
    }

    /**
     * returns label
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * returns label
     * @return string
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * returns inOverview
     * @return string
     */
    public function getInOverview()
    {
        return $this->inOverview;
    }
}