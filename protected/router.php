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
/*
function render($file_name) {
    $contents=file_get_contents($file_name);
    $i = 0;
    $command = "";
    while (true) {
        $char = $contents[$i];
        $i++;
        if ($char == "{") {
            $char = $contents[$i];
            $i++;
            if ($char == "{") {
                $command = "";
                while (true) {
                    $char = $contents[$i];
                    $i++;
                    if ($char == "}") {$char = $contents[$i];$i++;if ($char == "}") {break}}
                    $command = $command . $char;
                }
            }
        }
        if ($command != "") {
            
        }
    }
}
*/
?>