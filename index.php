<?php
include "./protected/router.php";
$router = new Router();
/*
The router has the following functions:
add_route(string route, function route)
this adds the route to the routers list of routes and allows the route function to look for it.
the route function can be called to render a page.
*/
$router->add_route("/",function() {
    echo("Welcome to the index.");
});
$router->add_route("/404", function () {
    echo("Oops! That looks like a 404!");
});
$router->add_route("/hey", function () {
    echo(file_get_contents("./protected/templates/hey.html"));
});
$router->route($_GET["route"]);
?>