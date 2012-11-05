<?php

/**
 * Application config file
 * Object for configuration options
 *
 * @package Thinkfw
 * @subpackage Config
 * @author WillemDaems
 *
 */

namespace Thinkfw;

class Config
{
    private $options = array();

    /**
     * Constructor
     *
     * Loads a config file in .ini structure
     *
     * @param string $location
     * @return void;
     */
    public function __construct($location)
    {
        // remove unwanted slashes
        $location = ltrim($location, '/');

        if (file_exists(BASE_PATH . '/'. $location)) {
            $this->options = parse_ini_file(BASE_PATH . '/'. $location, true);
        }
    }

    /**
     *
     * @param string $section
     * @param string $option
     * @return string | boolean
     */
    public function get($section, $option)
    {
        $section = strtoupper($section);
        $option = strtolower($option);

        if (isset($this->options[$section][$option])) {
            return $this->options[$section][$option];
        } else {
            return false;
        }
    }
}