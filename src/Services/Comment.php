<?php

namespace App\Services;

use PDO;
class Comment
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function addComment(int $userId, string $comment, int $postId): array
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO crazyblog.comments (userId, comment, postId) VALUES (:userId, :comment, :postId)");
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':comment', $comment);
            $stmt->bindParam(':postId', $postId);
            $stmt->execute();

            return ['success' => 'Коментар успішно додано'];
        } catch (\PDOException $e) {
            return ['error' => 'Помилка при додаванні коментарю: ' . $e->getMessage()];
        }
    }

    public function deleteComment(int $commentId, int $userId): array
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM crazyblog.comments WHERE id = :comment_id AND userId = :user_id");
            $stmt->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();

            return ['success' => 'Коментар успішно видалено!'];
        } catch (\PDOException $e) {
            return ['error' => 'Помилка при видаленні коментаря: ' . $e->getMessage()];
        }
    }
}