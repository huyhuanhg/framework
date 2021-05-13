<?php

namespace app\core;

use \App;

class Controller
{
    private $layout = null;

    public function __construct()
    {
        if (isset(Registry::getIntance()->web['layout'])) {
            $this->layout = Registry::getIntance()->web['layout'];
        } else {
            echo "layout khong ton tai<br>";
        }
    }

    public function setLayout($layout)
    {
        return $this->layout = 'layouts/' . $layout;
    }

    /**
     * @param $url
     * @param bool $isEnd
     * @param int $resPonseCode
     */
    public function redirect($url, $isEnd = true, $resPonseCode = 302)
    {
        header('Location:' . $url, true, $resPonseCode);
        if ($isEnd) {
            die();
        }
    }

    public function render($viewFile, $data = null, $layout = null)
    {
        if (isset($layout)){
            $this->setLayout($layout);
        }
        $viewContent = $this->getViewContent($viewFile, $data);
        if ($this->layout !== null) {
            $layoutPath = __DIR_ROOT__ . '/app/views/' . $this->layout . '.php';
            if (file_exists($layoutPath)) {
                require_once($layoutPath);
            }
        }
    }

    public function getViewContent($viewFile, $data = null)
    {
        $viewFolder = strtolower(str_replace('Controller', '', Registry::getIntance()->controller));
        $viewPath = __DIR_ROOT__ . '/app/views/' . $viewFolder . '/' . $viewFile . '.php';
        if (is_array($data)) {
            extract($data, EXTR_PREFIX_SAME, 'data');
        } else {
            $data = $data;
        }
        if (file_exists($viewPath)) {
            ob_start();
            require($viewPath);
            return ob_get_clean();
        }
    }

    public function renderPartial($view, $data = null)
    {
        $viewPath = __DIR_ROOT__ . '/app/views/' . $view . '.php';
        if (is_array($data)) {
            extract($data, EXTR_PREFIX_SAME, 'data');
        } else {
            $data = $data;
        }
        if (file_exists($viewPath)) {
            require($viewPath);
        }
    }
}