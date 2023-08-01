<?php

chdir("/var/www/concept2");
require "Lib/load_database.php";
require "Lib/dbschemasetup.php";

$schema = array();

require "Modules/user/user_schema.php";

print json_encode(db_schema_setup($mysqli, $schema, true))."\n";
