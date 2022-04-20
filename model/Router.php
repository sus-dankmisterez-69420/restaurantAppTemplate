<?php

class Router {

    /**
     * Entrypoint for the router
     */
    public function route() {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = str_replace(APP_ROOT, '', $uri);
        $uriParts = explode('/', $uri);
        if(count($uriParts) == 1 && $uriParts[0] == '') {
            $this->callRoute(APP_DEF_CONTROLLER, APP_DEF_CONTROLLER_METHOD, []);
        } else if(count($uriParts) > 1) {
            $this->callRoute($uriParts[0], $uriParts[1], array_splice($uriParts, 2, 1));
        }
        
    }

    /**
     * Imports and calls the route
     */
    private function callRoute($controller, $func, $args) {
        $controllerFullName = $controller.'Controller';
        require_once 'controller/'.$controller.'Controller.php';
        $theController = new $controllerFullName();
        call_user_func_array([$theController, $func], $args);
    }
}