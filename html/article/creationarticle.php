<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="workshop">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Assistant|M+PLUS+1p|Pacifico" rel="stylesheet">


    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/creationarticle.css">

    <title>Creation article</title>

  </head>

    <body>

        <h1>Patatoïde</h1>


        <div class="container">
            <div class="row">
                <div class="col-2">
                </div>

                <div class="col-8" id="form-event">
                        <h2> Crée ton événement :</h2>
                    <form method="post" id="forminscription" action="traitementevent.php">
                        <div class="form-group">
                            <label for="sel1">Type d'événement</label>
                            <select name="type" class="form-control" id="sel1">
                                <option>Se restaurer</option>
                                <option>Faire du sport</option>
                                <option>Sortir</option>
                            </select>
                        </div>
                        <input name="nom" type="title" class="form-control event" placeholder="Titre de l'événement" id="titre">
                        <input name="place" type="place" class="form-control event" placeholder="Lieu de l'événement" id="place">
                        <input name="date" type="date" class="form-control event" placeholder="Date" id="date">
                        <input type="time" name="time" id="type">
                        <input type="file" name="icone" id="icone" class="input-file event"/>
                        <textarea id="description" name="description" class="form-control event" placeholder="Descrition de l'événement" rows="4" required="required" ></textarea>
                        <center><button type="submit" class="btn btn-primary" id="boutonevent"><span>Creer l'événement</span></button></center>
                    </form>
                </div>

                <div class="col-3">
                </div>

            </div>
        </div>








    </body>

</html>
