<?php
define('EMONCMS_EXEC', 1);

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require "core.php";
require "route.php";

$path = get_application_path(false);
$route = new Route(get('q'), server('DOCUMENT_ROOT'), server('REQUEST_METHOD'));

if ($route->controller=="") {
    $route->controller = "account";
}

switch ($route->controller) {
    case "user":
        $output = view("login.php",array());
        break;
    case "account":
        $output = view("view.php",array());
        break;
    case "clubs": 
        $output = view("clubs_view.php",array());
        break;
}

echo view("theme.php",array("content"=>$output));