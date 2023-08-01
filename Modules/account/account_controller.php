<?php
// no direct access
defined('EMONCMS_EXEC') or die('Restricted access');

function account_controller() {

    global $session, $route;

    if ($route->action=="view") {
        if ($session['userid']) {
            return view("Modules/account/account_view.php", array());  
        }
    }
}