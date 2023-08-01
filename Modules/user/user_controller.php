<?php
// no direct access
defined('EMONCMS_EXEC') or die('Restricted access');

function user_controller() {

    global $mysqli, $session, $route, $user, $path;

    if ($route->action=="login") {
        if ($route->format=="html") {
            if (!$session['userid']) {
                return view("Modules/user/login_view.php", array("result"=>false));  
            } else {
                header('Location: '.$path);
            }
        } else if ($route->format=="json") {
            return $user->login(post("username"),post("password"));
        }
    }

    if ($route->action=="view" && $session['userid']) {
        return view("Modules/user/account_view.php", array());  
    }

    if ($route->action=="logout" && $session['userid']) {
        $user->logout();
        header("Location: ".$path);
        exit();
    }
    
    return false;
}