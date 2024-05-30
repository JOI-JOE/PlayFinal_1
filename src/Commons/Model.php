<?php

namespace  Danghau\Playfinal\Commons;

use Doctrine\DBAL\DriverManager;

class Model
{
    protected $conn;
    protected $queryBuilder;
    protected string $tableName;

    public function __construct()
    {
        $connectionParams = [
            'dbname'    => $_ENV['DB_NAME'],
            'user'      => $_ENV['DB_USERNAME'],
            'password'  => $_ENV['DB_PASSWORD'],
            'host'      => $_ENV['DB_HOST'],
            'port'      => $_ENV['DB_PORT'],
            'driver'    => $_ENV['DB_DRIVER'],
        ];

        $this->conn = DriverManager::getConnection($connectionParams);
        $this->queryBuilder = $this->conn->createQueryBuilder(); // truy vấn 
    }

    //CRUD
    protected function all()
    {
    }

    protected function paginate($page, $perPage)
    {
    }

    protected function insert()
    {
    }
    protected function update()
    {
    }

    protected function delete()
    {
    }

    public function getAll(string ...$columns)
    {
        return $this->queryBuilder
            ->select(...$columns)
            ->from($this->tableName)
            ->fetchAllAssociative();
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}
