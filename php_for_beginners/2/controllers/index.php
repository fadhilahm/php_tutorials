<?php

$banner = "Home";

$posts = $db->query('SELECT * FROM posts')->get();

require "views/index.view.php";
