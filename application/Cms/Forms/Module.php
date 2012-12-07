<?php

namespace APP\Cms\Forms;

use Thinkfw\Form\Form;
use Thinkfw\Form\Element;

class Module extends Form
{
    public function init($data)
    {
        // set the view to be rendered
        $this->setFormView('Cms/Views/forms/Module.phtml');

        foreach ($data->fields->field as $field) {

            $arr = $field->attributes();

            // create a simple text element without value
            $element = new Element($arr['type'], $arr['name'], $field->label, '');

            // add it to the form
            $this->addElement($element);
        }
    }

    public function validate()
    {
        foreach ($this->elements as $element)
        {
            echo $element['name'];
        }
    }
}