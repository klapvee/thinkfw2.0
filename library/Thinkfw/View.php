<?php

namespace Thinkfw;

use Thinkfw\View\AbstractView as AbstractView;

class View extends AbstractView
{
    public $viewLocation;

    public function setViewLocation($location)
    {
        $this->viewLocation = $location;
    }

    public function render()
    {
        ob_start();

        if (file_exists(APPLICATION_PATH.'/'.$this->viewLocation)) {
            require $this->viewLocation;
        }
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}