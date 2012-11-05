<?php

namespace Thinkfw\Application;

class AutoLoader
{
    /**
     * The autoloader for the application
     *
     * @param string $name
     * @return void
     */
    public static function autoload($name)
    {
        $className = ltrim($name, '\\');

        $fileName  = '';
        $namespace = '';



        if ($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);

            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }

        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        require $fileName;
    }
}