<?php

$banner = "Home";

$posts = $db->query("SELECT * FROM posts");
$notes = $db->query("SELECT * FROM notes");

require "views/index.view.php";
