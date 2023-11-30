<?php

    class RecettesManager {
        private $pdo;
    
        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }
    
        public function recupererToutesLesRecettes(){
            $stmt = $this->pdo->prepare("SELECT * FROM recettes");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Utilisez FETCH_ASSOC pour obtenir un tableau associatif
        
            $recettes = [];
            foreach ($results as $result) {
                $recettes[] = $result; // Ajoutez directement le tableau associatif
            }
        
            return $recettes;
        }
        

        public function modifierRecette($id, $nom, $difficulte, $temps_preparation, $instructions, $id_categorie) {
            $stmt = $this->pdo->prepare("UPDATE recettes SET nom_recette = :nom, difficulte = :difficulte, temps_preparation = :temps_preparation, instructions = :instructions, id_categorie = :id_categorie WHERE id_recette = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':difficulte', $difficulte);
            $stmt->bindParam(':temps_preparation', $temps_preparation);
            $stmt->bindParam(':instructions', $instructions);
            $stmt->bindParam(':id_categorie', $id_categorie);
            $stmt->execute();
        }

        public function ajouterRecette($nom, $difficulte, $temps_preparation, $instructions, $id_categorie) {
            $stmt = $this->pdo->prepare("INSERT INTO recettes (nom_recette, difficulte, temps_preparation, instructions, id_categorie) VALUES (:nom, :difficulte, :temps_preparation, :instructions, :id_categorie)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':difficulte', $difficulte);
            $stmt->bindParam(':temps_preparation', $temps_preparation);
            $stmt->bindParam(':instructions', $instructions);
            $stmt->bindParam(':id_categorie', $id_categorie);
            $stmt->execute();
        }
        
    }
    