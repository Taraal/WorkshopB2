<?php
session_start();

include_once "../classes/Database.php";
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
        <link rel="stylesheet" type="text/css" href="css/article.css">

        <title>Evenement</title>
    </head>
    <body>

<?php include_once("header.php"); ?>


<?php
    
    $idevenement=$_GET['id'];

    $db = Database::connect();
    $req = $db->prepare("SELECT * from evenements WHERE id_evenement=$idevenement");
    $req->execute();

    
  $donnee=$req->fetch(PDO::FETCH_ASSOC);

    
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

         echo "<img src=imagearticle/". $idimage.'.png>'; ?><br>

            </div>
                <?php 
                echo $donnee['description'];

                
                 ?>
                



                <h2>Retrouvez l'événement : </h2>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2710.539428592322!2d-1.5415818843833533!3d47.20602657916015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805eeca9d8b2345%3A0x5a361f845f36dde7!2sCampus+Hep+Nantes!5e0!3m2!1sen!2sfr!4v1536743082202" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


                <h3>Commentaires : </h3>

                <form method="post" id="forminscription" action="commentaireevent.php "  enctype="multipart/form-data">
                  <textarea id="comment" name="comment" class="form-control event commenta" placeholder="Laissez votre commentaire.." rows="4" required="required" ></textarea>
                  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                  <button type="submit" class="btn btn-primary" id="boutonevent" style="float:right;"><span>Commenter</span></button><br> 
                </form>

                <hr>

                <?php

                $idev=$_GET['id'];
                $req2=$db->prepare("SELECT * FROM commentaires WHERE id_evenement = $idev ORDER BY id_evenement DESC");
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