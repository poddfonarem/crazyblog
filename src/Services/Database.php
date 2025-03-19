<?php
namespace App\Services;

use PDO;
use PDOException;

class Database {
    private PDO $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect(): void
    {
        try {
            $this->conn = new PDO(
                'mysql:host=localhost;dbname=crazyblog',
                'root',
                '-_xYuooBSoHIA0w1',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_PERSISTENT => true
                ]
            );
        } catch (PDOException $e)
        {
            $_SESSION['error'] = $e->getMessage();
            die('Ошибка подключения к базе данных');
        }
    }

    public function getConnection(): PDO
    {
        return $this->conn;
    }
}
