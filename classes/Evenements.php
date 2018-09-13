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

        $statement = $pdo->prepare("SELECT * from evenements e JOIN participe pa ON pa.id_evenement=e.id_evenement WHERE pa.id_utilisateur = :id ORDER BY e.date");
            
        $statement->execute(array(":id" => $id));
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function get_one_event($id){

        $pdo = Database::connect();

        $statement = $pdo->prepare("SELECT * FROM evenements e WHERE id_evenement = :id");
        $statement->execute(array(':id'=>$id));

        return $statement->fetch();


    }
/*
    public static function get_events_groupe($id_user,$tri, $groupe){
        $pdo = Database::connect();

         $statement = $pdo->prepare("SELECT * from evenements e JOIN groupes g ON g.id_groupe=e.id_groupe JOIN membres me ON me.id_groupe = g.id_groupe WHERE me.id_utilisateur = :id_user AND e.id_theme = :id_theme AND e.id_groupe = :id_groupe ORDER BY e.date");

         $statement->execute(array(":id_user" => $id_user, ':id_theme'=>$tri, ':id_groupe'=>$groupe));
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

        public static function get_all_events_groupe($id_groupe){
        
        $pdo = Database::connect();

        $statement = $pdo->prepare("SELECT * from evenements e JOIN groupes g ON g.id_groupe=e.id_groupe WHERE e.id_groupe = :id_groupe ORDER BY e.date");
            
        $statement->execute(array(':id_groupe'=>$id_groupe));
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
 */

    public static function get_all_articles(){

        $pdo = database::connect();

        $statement = $pdo->prepare("SELECT * from articles e ORDER BY e.date");
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        return $results;
    }

    public static function get_specific_articles($tri){

        $pdo = database::connect();
        $statement = $pdo->prepare("SELECT * from articles WHERE sujet = :id_theme ORDER BY date");
        $statement->execute(array(':id_theme'=>$tri));

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }

    public static function get_all_events_groupes($id_g){

        $pdo = database::connect();
        $statement = $pdo->prepare("SELECT * from evenements e JOIN utilisateurs u ON u.id_utilisateur=e.id_proprio JOIN membres m ON m.id_utilisateur=u.id_utilisateur JOIN groupes g ON g.id_groupe=m.id_groupe WHERE m.id_groupe = :id_g AND e.id_proprio=m.id_utilisateur");
        $statement->execute(array(':id_g'=>$id_g));

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function get_all_events_groupes_tri($id_g, $tri){

        $pdo = database::connect();
        $statement = $pdo->prepare("SELECT * from evenements e JOIN utilisateurs u ON u.id_utilisateur=e.id_proprio JOIN membres m ON m.id_utilisateur=u.id_utilisateur JOIN groupes g ON g.id_groupe=m.id_groupe WHERE m.id_groupe = :id_g AND e.id_proprio=m.id_utilisateur AND e.id_theme = :tri");
        $statement->execute(array(':id_g'=>$id_g, ':tri'=>$tri));

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
