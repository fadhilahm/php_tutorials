<?php

view("index", [
    "banner" => "Home",
    "posts" => $db->query('SELECT * FROM posts')->get()
]);
