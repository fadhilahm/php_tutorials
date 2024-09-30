<?php

$banner = "Home";

$posts = $db->query('SELECT * FROM posts');

require "views/index.view.php";
