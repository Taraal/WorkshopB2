<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once $_SERVER['DOCUMENT_ROOT'] . "/../classes/Database.php";


if (isset($_POST['mail']) && isset($_POST['date']) && isset($_POST['password']) && isset($_POST['nom']) && isset($_POST['prenom'])){


    $db = Database::connect();

    $req = $db->prepare("SELECT * FROM personnes WHERE Email = :mail");
    $req->bindParam('mail', $_POST['mail']);
    $req->execute();
    $verif = $req->fetch();

    if($verif){

    header("location: ../index.php");        
    }

    else{

        $req = $db->prepare("INSERT INTO `personnes` (`id_Personne`, `Nom`, `Prenom`, `Date_naissance`, `Email`, `MDP`) VALUES (NULL, :nom, :prenom, :date, :mail, :mdp)");
        $req->execute(array(':nom' => $_POST['nom'], ':prenom' => $_POST['prenom'], ':date' => $_POST['date'], ':mail' => $_POST['mail'], ':mdp' => $_POST['password']));

        session_start();
    header("location: ../accueil.php");
    }


}



?>
