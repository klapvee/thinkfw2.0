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

            // get the attributes (simplexml)
            $arr = $field->attributes();

            // cast to bool, value from string
            $arr['required'] = (bool) $arr['required'];

            // cast to bool, value from string
            $arr['inOverview'] = (bool) $arr['inOverview'];

            // create a simple text element without value
            $element = new Element(
                    $arr['type'],
                    $arr['name'],
                    $field->label, '',
                    $arr['required'],
                    $arr['inOverview']
                );

            // add it to the form
            $this->addElement($element);
        }
    }
}