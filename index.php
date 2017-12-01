<?php

class Router {
    function __construct() {
        $this->routes = array();
        $this->routes_keys = array();
    }
    public function add_route($route, $route_callback) {
        $this->routes[$route] = $route_callback;
        array_push($this->routes_keys, $route);
    }
    public function route($requested_route) {
        $requested_route="/".$requested_route;
        if (in_array($requested_route, $this->routes_keys)) {
            $this->routes[$requested_route]();
        } else {
            $this->route("404");
        }
    }
}
$router = new Router();
$router->add_route("/404", function () {
    echo("Oops! That looks like a 404!");
});
$router->add_route("/hey", function () {
    echo("Welcome to the index of the page!");
});
$router->route($_GET["route"]);
?>