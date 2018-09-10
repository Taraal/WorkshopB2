
<!DOCTYPE html>
<html lang="fr">

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

    <title>Workshop</title>

  </head>

    <body>

        <div class="no-gutter">
            <div class="row">
                <div class="col-6" id="imageconnex">
                    <img src="medias/connexion.png" class="image">
                </div>                
                <div class="col-6" id="droite">
                    <h1>Patatoïde</h1>
                    <div id="laconnex">
                        <form method="post" id="formconnexion" action="connexion.php">
                            <input name="email" type="email" class="form-control" placeholder="Entrez votre adresse mail"><br><br>
                            <input name="mdp" type="mdp" class="form-control" placeholder="Mot de passe"><br>
                            <center><button type="button | submit" class="boutonconnexion"><span>Se connecter</span></button></center>
                        </form>
                        
                    </div>

                    <div class="infosite">
                        <div class="no-gutter">
                            <div class="row">
                                <div class="col-2">
                                    <img src="medias/patate.png" class="image2">
                                </div>
                                <div class="col-10">
                                    <p class="decouverte">Découvrez ce qu'il se passe <br>dans votre region en temps réel</p>
                                    <p class="rejoindre">Rejoignez Patatoïde dès maintenant.</p>
                                    <form method="post" id="formconnexion" action="inscription/index.php">
                                        <button type="submit" class="btn btn-primary" id="boutoninscr"><span>S'inscrire</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    
                </div>
            </div>
            

        </div>

    </body>

</html>
