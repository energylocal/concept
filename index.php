<?php

require "core.php";

$output = view("view.php",array());

echo view("theme.php",array("content"=>$output));