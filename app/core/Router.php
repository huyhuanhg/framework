<?php

namespace app\core;

use app\core\Registry;
use app\core\AppException;

/**
 * Class Router
 */
class Router
{
    private static $routers = [];

//    private $basePath;
//    private $controllerPath;

    public function __construct()
    {
//        $this->basePath = $basePath;
//        $this->controllerPath = str_replace('\\', '/', $namespace);
    }

    private function getRequestURL()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = trim($_SERVER['PATH_INFO'], '/');
        }

//        $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
//        $url = str_replace($this->basePath, '', $url);
        return $url ?? '/';
    }

    private function getRequestMethod()
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    private static function addRouter($method, $url, $action)
    {
        self::$routers[] = [$method, $url !== '/' ? trim($url, '/') : '/', $action];
    }

    static function get($url, $action)
    {
        self::addRouter('GET', $url, $action);
    }

    static function post($url, $action)
    {
        self::addRouter('POST', $url, $action);
    }

    static function any($url, $action)
    {
        self::addRouter('GET|POST', $url, $action);
    }

    private function callAction($action, $param)
    {
        if (is_callable($action)) {
            call_user_func_array($action, $param);
        }
        if (is_string($action)) {
            $ctl = explode('@', $action, 2);
            $methodName = end($ctl) ?? '';
            $clientFile = str_replace('\\', '/', __NSP_CTRL__ . '/' . reset($ctl) . 'Controller.php');
            $adminFile = str_replace('\\', '/', __NSP_ADMIN_CTRL__ . '/' . reset($ctl) . 'Controller.php');
            if (file_exists(__DIR_ROOT__ . '/' . $clientFile)) {
                $className = __NSP_CTRL__ . '\\' . reset($ctl) . "Controller";
            } elseif (file_exists(__DIR_ROOT__ . '/' . $adminFile)) {
                $className = __NSP_ADMIN_CTRL__ . '\\' . reset($ctl) . "Controller";
            } else {
//                response ve 404
                die('<h1>loi</h1>');
            }
            if (class_exists($className) && method_exists($className, $methodName)) {
                Registry::getIntance()->controller = reset($ctl);
                Registry::getIntance()->action = $methodName;
                $object = new $className;
                call_user_func_array([$object, $methodName], $param);
            } else {
//                throw new AppException("$className hoặc $methodName() không tồn tại!");
                echo "loi class hoac method";
            }
        }
        return "response()";
    }

    private function map()
    {
        $requestMethod = $this->getRequestMethod();
        $requestURI = $this->getRequestURL();
        $params = [];
        foreach (self::$routers as $route) {
            list($method, $url, $action) = $route;
            if (strpos($method, $requestMethod) === false) {
                continue;
            }
            if ($url !== '*') {
                if (count(explode('/', $requestURI)) > count(explode('/', $url))) {
                    continue;
                }
                if (strpos($url, '{') === false) {
                    if (strcmp(strtolower($url), strtolower($requestURI)) !== 0) {
                        continue;
                    }
                } else {
                    $path = trim(substr($url, 0, strpos($url, '{')), '/');
                    $requestURL = trim(substr($requestURI, 0, strpos($url, '{')), '/');
                    if (strcmp(strtolower($path), strtolower($requestURL)) !== 0) {
                        continue;
                    }
                    $listParamName = explode('/', trim(substr($url, strpos($url, '{')), '/'));
                    $listParamValue = explode('/', trim(substr($requestURI, strpos($url, '{')), '/'));
                    foreach ($listParamValue as $k => $val) {
                        if (preg_match('/^{\w+}$/', $listParamName[$k])) {
                            $params[] = $val;
                        }
                    }
                }
            }
            return $this->callAction($action, $params);

        }
    }

    public function run()
    {
        $this->map();
    }
}