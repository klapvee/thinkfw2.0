<?php

namespace Thinkfw;

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
        // chop off the first slash
        $className = ltrim($name, '\\');

        $fileName  = '';
        $namespace = '';

        // APP is application directory
        if (strpos($className, 'APP') !== false) {
            $className = str_replace('APP', '', $className);
            $className = ltrim($className, '\\');
        }

        // find last occurance of \
        $lastNsPos = strripos($className, '\\');

        // found
        if ($lastNsPos !== false) {

            // this might also have been rtrim? FIG standards..
            $namespace = substr($className, 0, $lastNsPos);

            // get the rest of the class
            $className = substr($className, $lastNsPos + 1);

            // the final classname
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }

        // replace the directory separators
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        include $fileName;

    }
}