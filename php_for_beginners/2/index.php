<?php

require "functions.php";
require "Response.php";

require "Database.php";

$config = require "config.php";
$db = new Database(config: $config['database']);

require "router.php";
