<?php

class Database
{

    private static ?Database $instance = null;
    private $fetchedData;
    private $mysqli;

    private function __construct()
    {
        $connection = new mysqli("bdcampus.cjscluic1bv9.eu-west-3.rds.amazonaws.com", "cryptoaway", "cryptoaway", "cryptoaway");
        if ($connection->connect_errno) throw new Exception("Ha ocurrido el error: $connection->connect_error");
        $this->mysqli = $connection;
    }

    public static function createInstance(): Database
    {
        if (is_null(self::$instance)) self::$instance = new Database;
        return self::$instance;
    }

    public function createQuery(string $sql): Database
    {
        $this->fetchedData = $this->mysqli->query($sql);
        return $this;
    }

    public function getFetchedData(string $class = "StdClass")
    {
        return $this->fetchedData->fetch_object($class);
    }

    public function getAll(string $class = "StdClass"): array
    {
        $data = [];

        while ($result = $this->getFetchedData($class)) {
            array_push($data, $result);
        }
        return $data;
    }

    public function getTotalRows(): ?int
    {
        return $this->fetchedData->num_rows;
    }

    public function escapeString(string $input): string
    {
        return $this->mysqli->real_escape_string($input);
    }

    public function getMySQLInfo()
    {
        return $this->mysqli;
    }

    public function getFeedBackQuery()
    {
        return $this->fetchedData;
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }

    private function __clone()
    {
    }
}
