<?php

    include_once "../classes/Database.php";
    include_once "../classes/Users.php";

    session_start();

    if (isset($_SESSION['id'])){
        
        $id = $_SESSION['id'];

        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }

       $user = new User($id); 
        
    } 
    else{

        header("location: index.php");

    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="workshop">
        <link rel="icon" href="medias/fav.png"/>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


        <!-- font -->
        <link href="https://fonts.googleapis.com/css?family=Assistant|M+PLUS+1p|Pacifico" rel="stylesheet">


        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/connexion.css">

        <title>Accueil</title>
    </head>
    <body>
        <?php include_once "header.php"?>
        <div class="Events">Mes Events</div>
        <div class="Events">Creer Events</div>
    
        <div class="Infos"><?php
            echo "Nom : " . $user->get_nom();
            echo "<br>";
            echo "Prenom : " . $user->get_prenom();
            echo "<br>";
            echo "Email : <a href=" . $user->get_email() .">" . $user->get_email() . "</a> ";
            echo "<br>";
            echo "Date de naissance : " .$user->get_date();

            ?>  
        </div>
        <div id="profil">
            <img id="photo_profile" src="medias/profile.png">
            <input name="Family_Name" type="text" id="Family_Name" placeholder="Nom" />
            <input name="Name" type="text" id="Name" placeholder="Prénom" />
            <input name="Mail" type="text" id="Mail" placeholder="Prénom.Nom@mailbox.com" />  
            <div id="les_buttons">  
                <button type="button" class="btn btn-success">Sauvegarder</button>
                <button type="button" class="btn btn-danger">Annuler</button>       
            </div>  
        </div>
    </body>
</html>
