<?php

Class Groupe {


    static public function get_all_groups(){

        $pdo = database::connect();

        $statement = $pdo->prepare("SELECT * FROM groupes");
        $statement->execute();

        $result = $statement->fetchAll();

        return $result;
    }

    static public function get_members($id){

        $pdo = database::connect();

        $statement = $pdo->prepare("SELECT * FROM membres m JOIN utilisateurs u ON m.id_utilisateur=u.id_utilisateur WHERE id_groupe = :id_g LIMIT 10");
        $statement->execute(array(':id_g'=>$id));

        $results = $statement->fetchAll();

        return $results;
    }




}
