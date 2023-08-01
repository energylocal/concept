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

    if ($route->action=="data") {
        $route->format = "json";

        // end time is end of today
        $end = strtotime('today midnight');
        // start time is 1 week ago
        $start = $end - 3600*24*31;
        // convert to milliseconds
        $end *= 1000;
        $start *= 1000;
        
        $apikey = $session['apikey_read'];

        $format = "keys";
        return json_decode(file_get_contents("https://dashboard.energylocal.org.uk/bethesda/household-daily-summary?start=$start&end=$end&format=$format&apikey=$apikey"));
    }
}