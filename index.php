<?php

require "Lib/load_database.php";

require "core.php";
require "route.php";
require("Modules/user/user_model.php");
$user = new User($mysqli);

$path = get_application_path(false);
$route = new Route(get('q'), server('DOCUMENT_ROOT'), server('REQUEST_METHOD'));

$session = $user->emon_session_start();

if ($route->controller=="") {
    if ($session['userid']) {
        $route->controller = "account";
        $route->action = "view";
    } else {
        $route->controller = "user";
        $route->action = "login";
    }
}

$output = false;

switch ($route->controller) {
    case "user":
        require "Modules/user/user_controller.php";
        $output = user_controller();
        break;
    case "account":
        require "Modules/account/account_controller.php";
        $output = account_controller();
        break;
    case "club":
        require "Modules/club/club_controller.php";
        $output = club_controller();
        break;
}

switch ($route->format) {

    case "html":
        echo view("theme/theme.php", array("content"=>$output, "route"=>$route, "session"=>$session));
        break;
        
    case "json":
        header('Content-Type: application/json');
        echo json_encode($output);   
        break; 
}
