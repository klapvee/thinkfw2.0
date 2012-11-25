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
        $nsName = $name;
        $className = ltrim($name, '\\');

        $fileName  = '';
        $namespace = '';

        if ($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);

            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }

        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';


        @include $fileName;


        // look in front directory
        if (!class_exists($name, false)) {

            // look in front app controller dir
            if (stripos($name, 'Controller') !== false) {
               $frontName = str_replace('Front', 'application', $name);
               $frontName = str_replace('\\', '/', $frontName);
               include BASE_PATH . '/'.$frontName . '.php';

            }
        }
    }
}