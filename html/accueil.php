<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

    include_once "../classes/Database.php";
    include_once "../classes/Users.php";

    session_start();

    var_dump($_SESSION);

    if(isset($_SESSION['id'])){

    $id = $_SESSION['id'];


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
        <div id="left">
            <div class="MesEvents">Mes Events</div>
            <div class="MesEvents">Creer Events</div>
            <div class="MesEvents"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d86684.63842802636!2d-1.630095838046561!3d47.23820066072374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805ee81f0a8aead%3A0x40d37521e0ded30!2sNantes!5e0!3m2!1sfr!2sfr!4v1536659121588" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe></div>
        </div>
        <div id="right">
            <div class="MesEvents">Groupes</div>
            <div class="MesEvents">Status Actualisés</div>
        </div>
        <div id="actu">
            <div class="Events">
                <div class="Titles">Le Titre de l'évènement</div>
                <img class="Heart" src="medias/like_empty.png" onmouseover="this.src='medias/like_full.png'"onmouseout="this.src='medias/like_empty.png'">
                <div class="Dates">La Date: 15/09/2018</div>
                <div class="Places">Le Lieux: 2ème rond point à droite</div>
                <div class="Descriptions">Description: Trop Méga bien ! Venez nombreux (même avec votre chien ou vôtre escargot)</div>
            </div>
            <div class="Events">                
                <div class="Titles">Le Titre de l'évènement</div>
                <img class="Heart" src="medias/like_full.png" onmouseover="this.src='medias/like_empty.png'"onmouseout="this.src='medias/like_full.png'">
                <div class="Dates">La Date: 15/09/2018</div>
                <div class="Places">Le Lieux: 2ème rond point à droite</div>
                <div class="Descriptions">Description: Trop Méga bien ! Venez nombreux (même avec votre chien ou vôtre escargot)</div>
            </div>
            <div class="Events">
                <div class="Titles">Le Titre de l'évènement</div>
                <img class="Heart" src="medias/like_empty.png" onmouseover="this.src='medias/like_full.png'"onmouseout="this.src='medias/like_empty.png'">
                <div class="Dates">La Date: 15/09/2018</div>
                <div class="Places">Le Lieux: 2ème rond point à droite</div>
                <div class="Descriptions">Description: Trop Méga bien ! Venez nombreux (même avec votre chien ou vôtre escargot)</div>
            </div>
            <div class="Events">
                <div class="Titles">Le Titre de l'évènement</div>
                <img class="Heart" src="medias/like_empty.png" onmouseover="this.src='medias/like_full.png'"onmouseout="this.src='medias/like_empty.png'">
                <div class="Dates">La Date: 15/09/2018</div>
                <div class="Places">Le Lieux: 2ème rond point à droite</div>
                <div class="Descriptions">Description: Trop Méga bien ! Venez nombreux (même avec votre chien ou vôtre escargot)</div>
            </div>
            <div class="Events">
                <div class="Titles">Le Titre de l'évènement</div>
                <img class="Heart" src="medias/like_empty.png" onmouseover="this.src='medias/like_full.png'"onmouseout="this.src='medias/like_empty.png'">
                <div class="Dates">La Date: 15/09/2018</div>
                <div class="Places">Le Lieux: 2ème rond point à droite</div>
                <div class="Descriptions">Description: Trop Méga bien ! Venez nombreux (même avec votre chien ou vôtre escargot)</div>
            </div>
            
        </div>
        
        
    </body>
</html>
