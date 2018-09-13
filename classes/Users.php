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

    public function create_group($nom, $description){

        $pdo = database::connect();

        $statement = $pdo->prepare("INSERT INTO groupes (id_groupe, id_proprio, nom, description) VALUES (NULL, :id_proprio, :nom, :desc)");
        $statement->execute(array(':id_proprio'=>$this->id, ':nom'=>$nom, ':desc'=>$description));

        return $id_g = $pdo->lastInsertId();
    }
    
    public function delete_group($id){

        $pdo = database::connect();

        $statement = $pdo->prepare("DELETE FROM groupes WHERE id_groupe = :id AND id_proprio = :id_u");
        $statement->execute(array(':id'=>$id, ':id_u'=>$this->id));

        $pdo = null;

    }

    public function join_group($id_g){

        $pdo = database::connect();

        $statement = $pdo->prepare("INSERT INTO membres (id_groupe, id_utilisateur) VALUES (:id_g, :id_u)");
        $statement->execute(array(':id_g'=> $id_g, ':id_u'=>$id_u));

        $pdo = null;

    }

    public function get_groups(){

        $pdo = database::connect();

        $statement = $pdo->prepare("SELECT * FROM groupes g JOIN membres m ON m.id_groupe=g.id_groupe WHERE m.id_utilisateur = :id_u");
        $statement->execute(array(':id_u'=>$this->id));

        $result = $statement->fetchAll();

        return $result;

    }

    public function get_all_groups(){
        
        $pdo = database::connect();

        $statement= $pdo->prepare("SELECT * FROM groupes g JOIN membres m ON m.id_groupe=g.id_groupe WHERE m.id_utilisateur != :id_u");
        $statement->execute(array(':id_u'=>$this->id));

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;

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
