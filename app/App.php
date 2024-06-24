<?php
class App
{
    protected $controller, $action, $params, $route;
    public function __construct()
    {
        global $routes;
        $this->route = new Route();
        if (!empty($routes['default_controller'])) {
            $this->controller = $routes['default_controller'];
        }
        $this->action = 'index';
        $this->params = [];

        $this->handleUrl();
    }

    function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }

    function handleUrl()
    {
        $url = $this->getUrl();
        // echo '<br>' . $url;
        $url = trim($url, '/');
        $url = $this->route->handleRoute($url);
        $urlArr = explode('/', $url);
        // echo '<pre>';
        // print_r($urlArr);
        // echo '</pre>';

        if (!empty($urlArr)) {
            $urlCheck = '';
            foreach ($urlArr as $key => $value) {
                $urlCheck .= $value . '/';
                $fileCheck = trim($urlCheck, '/');
                if (!empty($urlArr[$key - 1])) {
                    unset($urlArr[$key - 1]);
                }
                if (file_exists('app/Controllers/' . $fileCheck . '.php')) {
                    break;
                }
            }
            $fileArr = explode("/", $fileCheck);
            $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);
            $urlCheck = implode("/", $fileArr);
        }
        // echo $urlCheck;

        $urlArr = array_values($urlArr);
        // echo '<pre>';
        // print_r($urlArr);
        // echo '</pre>';

        if (empty($urlCheck)) {
            $urlCheck = $this->controller;
        }

        if (!empty($urlArr[0])) {
            $this->controller = ucfirst($urlArr[0]);
        } else {
            $this->controller = ucfirst($this->controller);
        }

        // echo $urlCheck;

        if (file_exists('app/Controllers/' . $urlCheck . ".php")) {
            require_once 'app/Controllers/' . $urlCheck . ".php";
            if (class_exists($this->controller)) {
                $this->controller = new $this->controller();
                unset($urlArr[0]);
            } else {
                $this->loadErrors();
            }
        } else {
            $this->loadErrors();
        }
        if (!empty($urlArr[1])) {
            $this->action = $urlArr[1];
            unset($urlArr[1]);
        }

        $this->params = array_values($urlArr);
        if (method_exists($this->controller, $this->action)) {
            call_user_func_array([$this->controller, $this->action], $this->params);
        } else {
            $this->loadErrors();
        }
    }

    public function loadErrors($error = '404')
    {
        require_once 'app/Errors/' . $error . '.php';
    }
}
