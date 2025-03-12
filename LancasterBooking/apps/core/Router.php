<?php
namespace Core;

class Router {
    public static function route($uri) {
        $segments = explode('/', $uri);
        $controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'HomeController';
        $methodName = $segments[1] ?? 'index';

        $controllerClass = "\\Controllers\\$controllerName";
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $methodName)) {
                call_user_func_array([$controller, $methodName], array_slice($segments, 2));
            } else {
                die("Method $methodName not found in $controllerClass.");
            }
        } else {
            die("Controller $controllerClass not found.");
        }
    }
}
