<?php


Class CategorieManager{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function getAll(){
        $stmt = $this->pdo->prepare("SELECT * FROM categories");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $categories = [];
        foreach($result as $categorie){
            $categories[] = new Categorie($categorie['id'], $categorie['nom_categorie']);
        }
        return $categories;
    }

    public function recupererRecetteParId($id) {
        $query = "SELECT * FROM recettes WHERE id = ?";
        return $this->db->executerRequete($query, [$id])->fetch(PDO::FETCH_ASSOC);
    }
}