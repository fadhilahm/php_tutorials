<?php

class Database
{
    private $connection;
    private $statement;

    public function __construct($config, $username = 'root', $password = 'rootpassword')
    {
        $dsn = "{$config['adapter']}:host={$config['host']};dbname={$config['dbname']};port={$config['port']};charset={$config['charset']}";
        $this->connection = new PDO(dsn: $dsn, username: $username, password: $password);
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        $this->statement = $statement;
        return $this;
    }

    public function get() {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find() {
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    public function findOrFail() {
        $item = $this->statement->fetch(PDO::FETCH_ASSOC);
        if (!$item) {
            abort(Response::NOT_FOUND);
        }
        return $item;
    }
}
