<?php

namespace Core;

use PDO;

class Database
{
    private $connection;
    private $statement;
    private $lastInsertId;

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

    public function insert($table, $data) {
        $columns = implode(',', array_keys($data));
        $values = implode(',', array_fill(0, count($data), '?'));
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        $statement = $this->connection->prepare($query);
        $statement->execute(array_values($data));
        $this->lastInsertId = $this->connection->lastInsertId();
        return $this;
    }

    public function lastInsertId() {
        return $this->lastInsertId;
    }
}
