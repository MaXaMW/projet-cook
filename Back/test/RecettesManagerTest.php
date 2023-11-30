<?php
use PHPUnit\Framework\TestCase;
require_once 'src/Recettes.php';
require_once 'src/RecettesManager.php';

Class RecettesMangerTest extends TestCase {
    private $pdo;
    private $RecettesManager;

    public function setUp(): void
    {
        $this->configureDatabase();
        $this->RecettesManager = new RecettesManager($this->pdo);
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

    public function recupererToutesLesRecettes(){
        $stmt = $this->pdo->prepare("SELECT * FROM recettes");
        $stmt->execute();
        $results = $stmt->fetchAll();
    
        $recettes = [];
        foreach ($results as $result) {
            $recettes[] = new Recette(
                $result['id_recette'],
                $result['nom_recette'],
                $result['difficulte'],
                $result['temps_preparation'],
                $result['instructions'],
                $result['id_categorie']
            );
        }
    
        return $recettes;
    }
    
    public function testRecupererToutesLesRecettes() {
        // Appel de la méthode pour récupérer toutes les recettes disponibles
        $toutesLesRecettes = $this->recupererToutesLesRecettes();
    
        // Assertions pour vérifier que des recettes ont été récupérées
        $this->assertIsArray($toutesLesRecettes); // Vérifie que $toutesLesRecettes est un tableau
        $this->assertNotEmpty($toutesLesRecettes); // Vérifie que le tableau n'est pas vide
        // ... Effectuez d'autres assertions pour vérifier les détails des recettes récupérées si nécessaire
    }
}
    