<?php
session_start();

include_once "../../classes/Database.php";
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
    $db = Database::connect();
    $idarticle=$_GET['id'];
    $req = $db->prepare("SELECT * from articles WHERE id_article=$idarticle");
    $req->execute();

    $req2=$db->prepare("SELECT nom, prenom FROM utilisateurs JOIN articles WHERE id_auteur=id_utilisateur && id_article=4");
    $req2->execute();

    
  $donnee=$req->fetch(PDO::FETCH_ASSOC);
  $name=$req2->fetch(PDO::FETCH_ASSOC);

    
?>


    <div class="container">
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-10">
                <h1> <?php echo $donnee['titre']; ?></h1>
                <p class="dateheure"> <?php echo 'le '. $donnee['date']; ?></p>
                <p class="lieu"><?php echo 'par '. $name['prenom'].' '.$name['nom']; ?></p>


<?php
        $idimage=$donnee['id_article'];

        ?><div class="center"><?php

         echo "<img src=imagearticles/". $idimage.'.png>'; ?><br>

            </div>
                <?php 
                echo $donnee['texte']; ?>
                  

                

                <h3>Commentaires : </h3>

                <form method="post" id="forminscription" action="../commentairearticle.php "  enctype="multipart/form-data">
                  <textarea id="comment" name="comment" class="form-control event commenta" placeholder="Laissez votre commentaire.." rows="4" required="required" ></textarea>
                  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                  <button type="submit" class="btn btn-primary" id="boutonevent" style="float:right;"><span>Commenter</span></button><br> 
                </form>

                <hr>

                <?php

                $idev=$_GET['id'];
                $req2=$db->prepare("SELECT * FROM commentairearticle WHERE id_article = $idev ORDER BY id_commentaire DESC");
                $req2->execute();
                $results = $req2->fetchAll(PDO::FETCH_ASSOC);

                

                for ($i = 0; $i <= count($results)-1; $i++) {
                  $iduser=$results[$i]['id_utilisateur'];

                  $req3=$db->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = $iduser ");
                  $req3->execute();
                  $resultat = $req3->fetchall(PDO::FETCH_ASSOC);
                  
                  $blase=$resultat[0]['prenom'].' '.$resultat[0]['nom'];
                  $text=$results[$i]['texte'];

                  ?>
                    <strong><p><?php echo $blase ?></p></strong>
                    <p><?php echo $text ?></p>
                    <hr>

                  <?php
              }




                ?>



            </div>
            <div class="col-1">
            </div>
        </div>
    </div>





    </body>
</html>