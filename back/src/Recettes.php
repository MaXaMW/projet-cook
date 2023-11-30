<?php
    Class Recette {
        private $id;
        private $nom;
        private $difficulte;
        private $tempsPreparation;

        public function __construct($id,$nom,$difficulte,$tempsPreparation){
            $this->id = $id;
            $this->nom = $nom;
            $this->difficulte = $difficulte;
            $this->tempsPreparation = $tempsPreparation;
        }

        public function getId(){
            return $this->id;
        }

        public function getNom(){
            return $this->nom;
        }
        public function getDifficulté(){
            return $this->difficulte;
        }
        public function getTempsPréparation(){
            return $this->tempsPreparation;
        }



    }