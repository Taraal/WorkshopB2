<?php

class config
{
    // const SERVERNAME="127.0.0.1";
    const SERVERNAME = "127.0.0.1";
//    const PORT = "3307";
    const DBNAME = "workshopb2";
    const USER = "root";
    const PASSWORD = "modepasse1"; // A CHANGER // 
    
}

class database
{
    private $db;

    static public function connect()
    {
        $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $db;
    }

    static public function testconnection($mail,$password){


        $req = (database::connect())->prepare("select * from personnes where email=:email");
        $req->bindParam(':email', $mail);
        $req->execute();
        $result = $req->fetchAll();
        if ($result!=null){

            if ($result[0]['MDP']==$password){
                $id= $result[0]['id_Personne'];
                session_start();

                header("Location: accueil.php?id=".$id);
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
