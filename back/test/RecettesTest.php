<?php
use PHPUnit\Framework\TestCase;

require_once './src/User.php';
require_once './src/UserManager.php';

class UserTest extends TestCase {
    private $pdo;
    private $userManager;

    public function setUp(): void
    {
        $this->configureDatabase();
        $this->userManager = new UserManager($this->pdo);
    }

    public function configureDatabase(): void
    {
        $this->pdo = new PDO(
            sprintf(
                'mysql:host=%s;port=%s;dbname=%s',
                getenv('DB_HOST'),
                getenv('DB_PORT'),
                getenv('DB_DATABASE')
            ),
            getenv('DB_USERNAME'),
            getenv('DB_PASSWORD')
        );

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}