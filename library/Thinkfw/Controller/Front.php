<?php
/**
 * Front.php
 *
 * Abstract class for front controllers
 *
 * @package Thinkfw
 * @subpackage Library
 * @category Abstract
 * @category FrontController
 */

namespace Thinkfw\Controller;
use Thinkfw\View as View;

abstract class Front
{
    /**
     * View
     *
     * @var Thinkfw\Library\View
     */
    public $view;

    /**
     * View location
     *
     * @var string
     */
    public $layout;

    /**
     * GET POST and parsed url value's
     *
     * @var array
     */
    public $params;

    /**
     * New Front
     *
     * @return void
     */
    public function __construct()
    {
        // assign a view object
        $this->view = new View;

        // assign default location
        $this->layout = 'default.phtml';

        // assign all post parameters
        foreach ($_POST as $key => $value)
        {
            $this->params[$key] = $value;
        }

        // assign all get parameters
        foreach ($_GET as $key => $value)
        {
            $this->params[$key] = $value;
        }

        // explode the url
        $parts = explode('/', $_SERVER['REQUEST_URI']);

        // assign to special index
        foreach ($parts as $part)
        {
            $this->params['request'][] = $part;
        }
    }

    /**
     * Return the view object
     *
     * @return Thinkfw\Library\View
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * Set the layout to be rendered
     *
     * @param string $layout
     * @return return void
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * Get the layout value to be rendered
     *
     * @return string
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * Gets a param from the param stack
     *
     * @param string|int $index
     * @return string
     */
    public function getParam($index)
    {
        $value = '';

        if (is_numeric($index)) {
            if (isset($this->params['request'][$index])) {
                $value = $this->params['request'][$index];
            }
        } else {
            if (isset($this->params[$index])) {
                $value = $this->params[$index];
            }
        }

        return $value;
    }

    /**
     * Return all GP params
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
}
