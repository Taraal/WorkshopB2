<?php

class Evenements {

    private $id;
    private $proprio;
    private $date;
    private $lieu;
    private $description;


    public static function get_events($id){
        
        $pdo = Database::connect();

        $statement = $pdo->prepare("SELECT * from evenements e JOIN participe pa ON pa.id_Evenement=e.id_Evenement WHERE pa.id_Personne = :id ORDER BY e.Date");
            
        $statement->execute(array(":id" => $id));
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }


}
