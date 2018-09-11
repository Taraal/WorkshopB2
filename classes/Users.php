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

    public function get_events(){
        
        $pdo = Database::connect();

        $statement = $pdo->prepare("SELECT * from evenements e JOIN participe pa ON pa.id_Evenement=e.id_Evenement WHERE pa.id_Personne = :id ORDER BY e.Date");
            
        $statement->execute(array(":id" => $this->id));
        return $statement->fetchAll(PDO::FETCH_ASSOC);

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
