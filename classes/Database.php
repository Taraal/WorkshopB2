<?php

class config
{
    const SERVERNAME="127.0.0.1";
    // const SERVERNAME = "90.59.72.190";
    const PORT = "3306";
    const DBNAME = "workshopb2";
    const USER = "root";
    const PASSWORD = "modepasse1"; // A CHANGER // 
    
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


        $req = (database::connect())->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $req->bindParam(':email', $mail);
        $req->execute();
        $result = $req->fetchAll();
        if ($result!=null){

            if ($result[0]['mdp']==$password){
                $id= $result[0]['id_utilisateur'];
                session_start();

                $_SESSION['id'] = $id;

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
