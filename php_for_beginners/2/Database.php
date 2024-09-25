<?php

class Database
{
    private $connection;

    public function __construct()
    {
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
        $this->connection = new PDO(dsn: $dsn, username: $env['user'], password: $env['pass']);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
