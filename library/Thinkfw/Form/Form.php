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
}