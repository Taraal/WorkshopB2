<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../../classes/Database.php";


if (isset($_POST['mail']) && isset($_POST['date']) && isset($_POST['password']) && isset($_POST['nom']) && isset($_POST['prenom'])){


    $db = Database::connect();

    $req = $db->prepare("SELECT * FROM utilisateurs WHERE email = :mail");
    $req->bindParam('mail', $_POST['mail']);
    $req->execute();
    $verif = $req->fetch();

    if($verif){

    header("location: ../index.php");        
    }

    else{

        $req = $db->prepare("INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `date_naissance`, `email`, `mdp`) VALUES (NULL, :nom, :prenom, :date, :mail, :mdp)");
        $req->execute(array(':nom' => $_POST['nom'], ':prenom' => $_POST['prenom'], ':date' => $_POST['date'], ':mail' => $_POST['mail'], ':mdp' => $_POST['password']));

        session_start();
    
        $_SESSION['id'] = $db->lastInsertId();

    header("location: ../dashboard.php");
    }


}



?>
