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

        $statement = $pdo->prepare("SELECT * FROM utilisateurs u WHERE u.id_utilisateur = :id");
        $statement->bindParam('id', $id);
        $statement->execute();

        $infos = $statement->fetch();

        if($statement) {
            $this->id = $infos['id_utilisateur'];
            $this->nom = $infos['nom'];
            $this->prenom = $infos['prenom'];
            $this->date = $infos['date_naissance'];
            $this->email = $infos['email'];
            $this->mdp = $infos['mdp'];
        }

        $pdo = null;
    }


    
    public function get_id(){
        return $this->id;
    }
    
    public function get_nom(){
        return $this->nom;
    }

    public function get_prenom(){
        return $this->prenom;
    }

    public function get_email(){
        return $this->email;
    }

    public function get_date(){
        return $this->date;
    }

    public function get_mdp(){
        return $this->mdp;
    }
}
