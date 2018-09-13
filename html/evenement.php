<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include_once "../classes/Database.php";
include_once "../classes/Evenements.php";
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
        <link rel="stylesheet" type="text/css" href="../css/article.css">

        <title>Evenement</title>
    </head>
    <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="javascript:void(0)">Patatoïde</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navb">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0)">Mes events</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="creationarticle.php">Creer events</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0)">Groupes</a>
      </li>
    </ul>

<div class="dropdown my-2 my-lg-0">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Baptiste PAPA
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Mon profil</a>
    <a class="dropdown-item" href="#">Se deconnecter</a>
  </div>
</div>

</nav>


<?php

    $donnee = Evenements::get_one_event($_GET['id']);
    
?>


    <div class="container">
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-10">
                <h1> <?php echo $donnee['nom']; ?></h1>
                <p class="dateheure"> <?php echo $donnee['date'].' - '. $donnee['heure']; ?></p>
                <p class="lieu"><?php echo $donnee['lieu']; ?></p>


<?php
        $idimage=$donnee['id_evenement'];

        ?><div class="center"><?php

         echo "<img src=article/imagearticle/". $idimage.'.png>'; ?><br>

            </div>
                <?php 
                echo $donnee['description']; ?>
                



                <h2>Retrouvez l'événement : </h2>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2710.539428592322!2d-1.5415818843833533!3d47.20602657916015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805eeca9d8b2345%3A0x5a361f845f36dde7!2sCampus+Hep+Nantes!5e0!3m2!1sen!2sfr!4v1536743082202" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                



            </div>
            <div class="col-1">
            </div>
        </div>
    </div>





    </body>
</html>