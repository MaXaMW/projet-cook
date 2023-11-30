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

        

    }