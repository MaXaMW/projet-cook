<?php

    class RecettesManager {
        private $pdo;
    
        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
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
    }
    