<?php

namespace App\Services;

use PDO;

class Post
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function addPost(string $title, string $text, int $userId): array
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO crazyblog.posts (title, text, userId) VALUES (:title, :text, :userId)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':text', $text);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();

            return ['success' => 'Пост успішно додано!'];
        } catch (\PDOException $e) {
            return ['error' => 'Помилка: ' . $e->getMessage()];
        }
    }
}