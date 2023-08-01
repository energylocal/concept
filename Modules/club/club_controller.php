<?php
// no direct access
defined('EMONCMS_EXEC') or die('Restricted access');

function club_controller() {

    global $session, $route;

    if ($route->action=="list") {
        $clubs = json_decode(file_get_contents("https://dashboard.energylocal.org.uk/club/list"));
        return view("Modules/club/club_list.php", array("clubs"=>$clubs));
    }
}
