<?php
use PHPUnit\Framework\TestCase;
require_once 'src/Recettes.php';
require_once 'src/RecettesManager.php';

class CategorieManagerTest extends TestCase{

    private $pdo;
    private $CategorieManager;

    public function setUp(): void
    {
        $this->configureDatabase();
        $this->CategorieManager = new CategorieManager($this->pdo);
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

    public function testRecupererRecetteParId(): void {
        $recette = $this->recetteManager->recupererRecetteParId(1);

        $this->assertNotEmpty($recette);
        $this->assertEquals(1, $recette['id']);
    }
}