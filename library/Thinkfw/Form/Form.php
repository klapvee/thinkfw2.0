<?php

namespace Thinkfw\Form;

use Thinkfw\Form\Element;
use Thinkfw\View;

/**
 * Form object, holds a view and an element array
 *
 * @package Thinkfw
 * @subpackage Form
 * @author WillemDaems
 *
 *
 */

class Form
{
    /**
     * Element array
     * @var array
     */
    private $elements = array();

    /**
     * View for the form to be rendered in
     * @var \Thinkfw\View
     */
    private $form;

    /**
     * Location of the form view
     * @var string
     */
    private $viewLocation;

    /**
     * Parameters
     *
     * @var array
     */
    private $parameters;

    /**
     * Creates new Form object
     * @return void
     */
    public function __construct()
    {
        $this->form = new View;
    }

    /**
     * Adds an element object to the array
     * @param \Thinkfw\Form\Element $element
     * @return void
     */
    public function addElement(\Thinkfw\Form\Element $element)
    {
        array_push($this->elements, $element);
    }

    /**
     * Sets the location of the view to be rendered
     * @param string $viewLocation
     */
    public function setFormView($viewLocation)
    {
        $this->viewLocation = $viewLocation;
    }

    /**
     * Render the form and return the output
     * @return string
     */
    public function render()
    {
        $this->form->setViewLocation($this->viewLocation);
        $this->form->elements = $this->elements;
        return $this->form->render();
    }

    /**
     * Set parameters for validation
     *
     * @param array $params
     * @return false
     */
    public function setParameters(array $params, $link = true)
    {
        $this->parameters = $params;
        foreach ($this->elements as $element) {
            foreach ($params as $key => $value) {
                $name = $element->getName();

                if ($name === $key) {
                    $element->setValue($value);
                    break;
                }
            }
        }
    }

    /**
     * Validate form fields
     *
     * @return boolean
     */
    public function validate()
    {
        $validated = true;

        foreach ($this->elements as $element)
        {
            // assign required property, cast to bool
            $required = (bool) $element->getRequired();

            // assign element name
            $name = $element->getName();

            // strip tags, no cheating
            $value = strip_tags($this->getParameterValue($name));

            if ($required === true) {
                if (empty($value)) {
                    $validated = false;
                }
            }
        }

        return $validated;
    }

    /**
     * Get parameter value
     *
     * @param string $key
     */
    public function getParameterValue($key)
    {
        $value = '';

        if (isset($this->parameters[$key])) {
            $value = $this->parameters[$key];
        }

        return $value;
    }
}