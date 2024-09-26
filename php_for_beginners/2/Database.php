<?php

class Database
{
    private $connection;

    public function __construct($config, $username = 'root', $password = 'rootpassword')
    {
        $dsn = "{$config['adapter']}:host={$config['host']};dbname={$config['dbname']};port={$config['port']};charset={$config['charset']}";
        $this->connection = new PDO(dsn: $dsn, username: $username, password: $password);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
