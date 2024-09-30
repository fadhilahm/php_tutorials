<?php

$banner = "Notes";

$notes = $db->query("SELECT * FROM notes");

require "views/notes.view.php";
