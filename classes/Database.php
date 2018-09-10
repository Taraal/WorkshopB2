<?php

class config
{
    // const SERVERNAME="127.0.0.1";
    const SERVERNAME = "127.0.0.1";
    const PORT = "3307";
    const DBNAME = "workshopb2";
    const USER = "root";
    const PASSWORD = "";
    
}

class database
{
    private $db;

    static public function connect()
    {
        $db = new PDO("mysql:host=" . Config::SERVERNAME . ";port=" . Config::PORT . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $db;
    }

    static public function testconnection($mail,$password){


        $req = (database::connect())->prepare("select mdp from personnes where email=:email");
        $req->bindParam(':email', $mail);
        $req->execute();

        $result = $req->fetchAll();
        if ($result!=null){
            if ($result[0]['mdp']==$password){
                header("Location: accueil.php");
            }
            else{
                echo "<div class='alert alert-danger' id='info'><strong>Erreur de connexion!</strong> Nom d'utilisateur ou mot de passe incorrect.</div>";
            }
        }        
        else{
            echo "<div class='alert alert-danger' id='info'><strong>Erreur de connexion!</strong> Nom d'utilisateur ou mot de passe incorrect.</div>";
        }
                    

    }

};