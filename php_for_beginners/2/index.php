<?php

require "functions.php";
require "router.php";

$environments = [
    'default_migration_table' => 'phinxlog',
    'default_environment' => 'development',
    'development' => [
        'adapter' => 'mysql',
        'host' => '127.0.0.1',
        'name' => 'todo_db',
        'user' => 'root',
        'pass' => 'rootpassword',
        'port' => '3306',
        'charset' => 'utf8',
    ],
];
$env = $environments['development'];

$dsn = "{$env['adapter']}:host={$env['host']};dbname={$env['name']};port={$env['port']};charset={$env['charset']}";
$pdo = new PDO(dsn: $dsn, username: $env['user'], password: $env['pass']);

$statement = $pdo->prepare(query: "SELECT * FROM posts");
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

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
