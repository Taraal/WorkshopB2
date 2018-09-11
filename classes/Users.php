<?php

Class User {

    private $id;
    private $nom;
    private $prenom;
    private $date;
    private $email;
    private $mdp;


    public function __construct($id){

        $pdo = Database::connect();

        $statement = $pdo->prepare("SELECT * from personnes p WHERE p.id_Personne = :id");
        $statement->bindParam('id', $id);
        $statement->execute();

        $infos = $statement->fetch();

        if($statement) {
            $this->id = $infos['id_Personne'];
            $this->nom = $infos['Nom'];
            $this->prenom = $infos['Prenom'];
            $this->date = $infos['Date_naissance'];
            $this->email = $infos['Email'];
            $this->mdp = $infos['MDP'];
        }

        $pdo = null;
    }



    }



}
