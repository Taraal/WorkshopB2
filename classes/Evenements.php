<?php

class Evenements {

    private $id;
    private $proprio;
    private $date;
    private $lieu;
    private $description;

    public static function get_all_events(){

        $pdo = database::connect();

        $statement = $pdo->prepare("SELECT * from evenements e ORDER BY e.date");
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        return $results;
    }

    public static function get_specific_events($tri){

        $pdo = database::connect();
        $statement = $pdo->prepare("SELECT * from evenements WHERE id_theme = :id_theme ORDER BY date");
        $statement->execute(array(':id_theme'=>$tri));

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }

    public static function get_events($id){
        
        $pdo = Database::connect();

        $statement = $pdo->prepare("SELECT * from evenements e JOIN participe pa JOIN ON pa.id_evenement=e.id_Evenement WHERE pa.id_utilisateur = :id ORDER BY e.date_heure");
            
        $statement->execute(array(":id" => $id));
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }


}
