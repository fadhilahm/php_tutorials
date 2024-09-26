<?php

require "functions.php";
require "router.php";
require "Database.php";

$config = require "config.php";

$db = new Database(config: $config['database']);
$posts = $db->query(query: "SELECT * FROM posts WHERE ID > 1");

echo "<div class='flex gap-x-2 py-2 px-4'>";
foreach ($posts as $post) {
    echo "
    <div class='flex rounded shadow-lg max-w-sm flex-col bg-blue-100 py-2 px-4'>
        <p class='text-gray-500 font-semibold text-xl'>{$post['title']}</p>
        <p class='text-gray-500'>{$post['content']}</p>
    </div>
    ";
}
echo "</div>";
