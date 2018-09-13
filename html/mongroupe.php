
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../classes/Evenements.php";
include_once "../classes/Database.php";
include_once "../classes/Users.php";

session_start();

if (isset($_SESSION['id'])) {

    $id = $_SESSION['id'];


    $user = new User($id);

} else {
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
        <link rel="stylesheet" type="text/css" href="css/dashboard.css">

        <title>Accueil</title>
    </head>
    <body>

<?php  include_once "header.php"; ?>

<div class="no-gutter">
    <div class="row">
    <div class="col-3">
        <div class="boutonchoix">
            <div class="btn-group">
                <button type="button" class="btn btn-primary active">Evenement</button>
                <button type="button" class="btn btn-primary">Article</button>
            </div>
        </div>

    </div>

    <div class="col-6">
        <div class="boutonchoix">
            <?php if(isset($_GET['tri'])){ ?>
                    <?php if($_GET['tri']=='3'){?>
            <div class="btn-group">
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe']; ?>"><button type="button" name="tri" value="all" class="btn btn-primary">Tous</button></a>
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe'].'&tri=1'; ?>"><button type="button" name="tri" value="restau" class="btn btn-primary">Se restaurer</button></a>
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe'].'&tri=2'; ?>"><button type="button" name="tri" value="sport" class="btn btn-primary">Faire du sport</button></a>
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe'].'&tri=3'; ?>"><button type="button" name="tri" value="sortir" class="btn btn-primary active">Sortir</button></a>
            </div>
            <?php }elseif($_GET['tri']=='2'){ ?>
                <div class="btn-group">
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe']; ?>"><button type="button" name="tri" value="all" class="btn btn-primary">Tous</button></a>
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe'].'&tri=1'; ?>"><button type="button" name="tri" value="restau" class="btn btn-primary">Se restaurer</button></a>
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe'].'&tri=2'; ?>"><button type="button" name="tri" value="sport" class="btn btn-primary active">Faire du sport</button></a>
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe'].'&tri=3'; ?>"><button type="button" name="tri" value="sortir" class="btn btn-primary">Sortir</button></a>
            </div>
            <?php }elseif($_GET['tri']=='1'){ ?>
                <div class="btn-group">
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe']; ?>"><button type="button" name="tri" value="all" class="btn btn-primary">Tous</button></a>
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe'].'&tri=1'; ?>"><button type="button" name="tri" value="restau" class="btn btn-primary active">Se restaurer</button></a>
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe'].'&tri=2'; ?>"><button type="button" name="tri" value="sport" class="btn btn-primary">Faire du sport</button></a>
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe'].'&tri=3'; ?>"><button type="button" name="tri" value="sortir" class="btn btn-primary">Sortir</button></a>
            </div>

            <?php }}else{ ?>
                <div class="btn-group">
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe']; ?>"><button type="button" name="tri" value="all" class="btn btn-primary active">Tous</button></a>
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe'].'&tri=1'; ?>"><button type="button" name="tri" value="restau" class="btn btn-primary">Se restaurer</button></a>
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe'].'&tri=2'; ?>"><button type="button" name="tri" value="sport" class="btn btn-primary">Faire du sport</button></a>
                <a href="mongroupe.php?groupe=<?php echo $_GET['groupe'].'&tri=3'; ?>"><button type="button" name="tri" value="sortir" class="btn btn-primary">Sortir</button></a>
            </div>
                <?php } ?>

        </div>
    </div>

    <div class="col-3">
        <div class="boutonchoix">
        <form method="post" id="forminscription" action="joingroupe.php "  enctype="multipart/form-data">
            <input type="hidden" name="idgroupe" value="<?php echo $_GET['groupe']; ?>">
            <button type="submit" class="btn btn-primary">Rejoindre groupe</button>
        </form>
    </div>
    </div>

</div>
</div>


<?php 

if (isset($_GET["tri"])) {

    $results = Evenements::get_all_events_groupes_tri($_GET['groupe'], $_GET['tri']);

}
else { 
    $results = Evenements::get_all_events_groupes($_GET['groupe']);
}

$i2 = 0;
$i3 = 0;
$tabimpair = [];
$tabpair = [];
    for($i = 0 ; $i < count($results); $i++){
        if($i % 2 == 0){
            $tabpair[$i2] = $results[$i];
            $i2++;
        }
        elseif($i % 2 !=0){
            $tabimpair[$i3] = $results[$i];
            $i3++;
        }
    }

?>
        <div class="container">
        <div class="row"> 
  <div class="column">
<?php
    foreach($tabpair as $key => $value){
?>
        <div class="no-gutter image">
        
        <img class="Heart" src="medias/like_empty.png" onmouseover="this.src='medias/like_full.png'"onmouseout="this.src='medias/like_empty.png'">
       <a href="evenement.php?id=<?php echo $value['id_evenement']; ?>"> <img src="imagearticle/<?php echo $value['id_evenement']; ?>.png" alt="Norway" style="width:100%;">
        </a>
        <div class="text-block"> 
        <h4><?php echo $value['nom']; ?></h4>
        </div>
    </div>

<?php  } ?>
  </div>

  <div class="column">
<?php
    foreach($tabimpair as $key => $value){
?>
        <div class="no-gutter image">
    
        <img class="Heart" src="medias/like_empty.png" onmouseover="this.src='medias/like_full.png'"onmouseout="this.src='medias/like_empty.png'">
        <a href="evenement.php?id=<?php echo $value['id_evenement']; ?>">
        <img src="imagearticle/<?php echo $value['id_evenement']; ?>.png" alt="Norway" style="width:100%;">
        </a>
        <div class="text-block"> 
        <h4><?php echo $value['nom']; ?></h4>
        </div>
    </div>

<?php  } ?>
  </div>

</div>
</div>





    </body>
</html>
