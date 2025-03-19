<?php
use PHPUnit\Framework\TestCase;
use App\Services\Database;
use App\Services\Auth;

class AuthTest extends TestCase {
    private PDO $conn;
    private Auth $auth;

    protected function setUp(): void {
        try {
            $database = new Database();
            $this->conn = $database->getConnection();
            $this->auth = new Auth($this->conn);
        } catch (\PDOException $e) {
            $this->fail("Database connection failed: " . $e->getMessage());
        }
    }

    public function testLoginSuccess() {
        $nickname = 'testuser';
        $password = 'correct_password';

        $this->conn->exec("INSERT INTO crazyblog.users (nickname, username, avatar, email, password, status) 
                           VALUES ('testuser', 'Test User', '/assets/images/User.png', 'testuser@example.com', '" . password_hash('correct_password', PASSWORD_DEFAULT) . "', 1)");

        $result = $this->auth->login($nickname, $password);

        $this->assertArrayHasKey('user_id', $result);
        $this->assertTrue($result['logged']);
    }

    public function testLoginUserNotFound() {
        $nickname = 'nonexistent_user';
        $password = 'some_password';

        $result = $this->auth->login($nickname, $password);

        $this->assertArrayHasKey('error', $result);
        $this->assertEquals('Користувача з таким нікнеймом не знайдено', $result['error']);
    }

    protected function tearDown(): void {
        $this->conn->exec("DELETE FROM crazyblog.users WHERE nickname = 'testuser'");
    }
}