
<?php

class RecettesManager {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

        public function recupererRecetteParId($id) {
            $query = "SELECT * FROM recettes WHERE id = ?";
            return $this->db->executerRequete($query, [$id])->fetch(PDO::FETCH_ASSOC);
        }
    
        public function modifierRecette($id, $nom, $difficulte, $tempsPreparation, $ustensiles, $autresChamps) {
            $query = "UPDATE recettes SET nom = ?, difficulte = ?, temps_preparation = ?, ustensiles = ?, autres_champs = ? WHERE id = ?";
            $this->db->executerRequete($query, [$nom, $difficulte, $tempsPreparation, $ustensiles, $autresChamps, $id]);
        }
    
        public function supprimerRecette($id) {
            $query = "DELETE FROM recettes WHERE id = ?";
            $this->db->executerRequete($query, [$id]);
        }
    }
    