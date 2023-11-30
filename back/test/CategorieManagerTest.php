<?php
use PHPUnit\Framework\TestCase;
require_once 'src/CategorieManager.php';
require_once 'src/Categorie.php';

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

    public function getCategorieByid($id){
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE id_categorie = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return new Categorie($result['id_categorie'], $result['nom_categorie']);
    }


     public function testGetCategorieById(){
        $categorie = $this->getCategorieByid(2);
        $this->assertEquals(2, $categorie->getId());
        $this->assertEquals('Plat', $categorie->getNom());
     }

     public function getRecettesByCategorie($id){
    $stmt = $this->pdo->prepare("SELECT * FROM recettes WHERE id_categorie = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetchAll();
    $recettes = [];
    foreach($result as $recette){
        // Crée un objet Recette en utilisant les colonnes correctes de la table recettes
        $recettes[] = new Recette($recette['id_recette'], $recette['nom_recette'], $recette['difficulte'], $recette['temps_preparation'], $recette['instructions'], $recette['id_categorie']);
    }
    return $recettes;
    }
}