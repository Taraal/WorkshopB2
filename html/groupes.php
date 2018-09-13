<?php

error_reporting(E_ALL);
ini_set("display_errors",1);


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
        
        <link rel="stylesheet" type="text/css" href="css/groupes.css">

        <title>Groupes</title>
    </head>
    <body>
        <?php  include_once "header.php"; ?>


<div class="no-gutter">
    <div class="row">
        <div class="col-2">
            <div class="container creer">
            <h3>Creer groupe</h3>
            <form method="post" id="forminscription" action="creergroupe.php" enctype="multipart/form-data">
                <input class="form-control event" name="nomgroupe" type="text" id="Family_Name" placeholder="Nom du Groupe" /><br>
                <input class="form-control event" name="descgroupe" type="text" id="Family_Name" placeholder="Description du groupe" style="height:50px;" /><br>
                <input type="hidden" name="id_user" value="<?php echo  $user->get_id(); ?>">
                <button id="boutton_creation" type="submit" class="btn btn-success">Creer</button>
            </form>

            </div>
        </div>
<div class="col-10">
<div class="container">
    <h1> Mes groupes :</h1>
<div class="row"> 
    
<?php

    $groups = $user->get_groups();


$i2 = 0;
$i3 = 0;
$tabimpair = [];
$tabpair = [];
for ($i = 0; $i < count($groups); $i++) {
    if ($i % 2 == 0) {
        $tabpair[$i2] = $groups[$i];
        $i2++;
    } elseif ($i % 2 != 0) {
        $tabimpair[$i3] = $groups[$i];
        $i3++;
    }
} ?>
<div class="container">
    <div class="row">
    <?php foreach($tabpair as $key => $value){


?>

  <div class="column">
    <div class="no-gutter">
        <img src="medias/groupe.png" alt="Norway" style="width:100%;">
        <a href="mongroupe.php?groupe=<?php  echo $value['id_groupe']; ?>">
             <div class="text-block"> 
                 <h4><?php  echo $value['nom']; ?></h4>
             </div>
        </a>
    </div>
</div>

<?php } ;
foreach($tabimpair as $key => $value){ ?>



  <div class="column">
    <div class="no-gutter">
        <img src="medias/groupe.png" alt="Norway" style="width:100%;">
        <a href="mongroupe.php?groupe=<?php  echo $value['id_groupe']; ?>">
             <div class="text-block"> 
                 <h4><?php  echo $value['nom']; ?></h4>
             </div>
        </a>
    </div></div></div>

<?php } ?>
</div>
</div>
  </div>



<div class="container bas">
    <h1> Groupes qui pourraient vous interesser :</h1>
<div class="row"> 

<?php

        $all_groups = $user->get_all_groups();

    var_dump($all_groups);

$i4 = 0;
$i5 = 0;
$tabimpair2 = [];
$tabpair2 = [];
for ($i = 0; $i < count($all_groups); $i++) {
    if ($i % 2 == 0) {
        $tabpair2[$i4] = $all_groups[$i];
        $i4++;
    } elseif ($i % 2 != 0) {
        $tabimpair2[$i5] = $all_groups[$i];
        $i5++;
    }
}
?>
<div class="container">
    <div class="row">

    <?php foreach($tabpair2 as $key => $value){
?>

  <div class="column">
    <div class="no-gutter">
        <img src="medias/groupe.png" alt="Norway" style="width:100%;">
        <a href="mongroupe.php?groupe=<?php  echo $value['id_groupe']; ?>">
             <div class="text-block"> 
                 <h4><?php echo $value['nom']; ?></h4>
             </div>
        </a>
    </div>
</div>

<?php 
        }
?>

    <?php foreach($tabimpair2 as $key => $value){
?>

  <div class="column">
    <div class="no-gutter">
        <img src="medias/groupe.png" alt="Norway" style="width:100%;">
        <a href="mongroupe.php?groupe=<?php  echo $value['id_groupe']; ?>">
             <div class="text-block"> 
                 <h4><?php echo $value['nom']; ?></h4>
             </div>
        </a>
    </div>
</div>

<?php 
        }
?>
  </div>
</div>
</div>

</div>
</div>
</div>
</div>







<!-- 
        <div id="create_group">
            <div class="Titles">Creer Groupe</div><br>
            <input class="input" name="Family_Name" type="text" id="Family_Name" placeholder="Nom du Groupe" /><br>
            <input class="input" name="Family_Name" type="text" id="Family_Name" placeholder="Description du groupe" style="height:50px;" /><br>
            <button id="boutton_creation" type="button" class="btn btn-success">Creer</button>
        </div>
        <div id="my_groups"><div class="Titles">Mes Groupes</div>
            <div class="group"><div class="Title">Groupe 1</div>
                <div class="person">Personne 1</div>
                <div class="person">Personne 2</div>
                <div class="person">Personne 3</div>
                <div class="person">Personne 4</div>
                <div class="person">Personne 5</div>
            </div>
            <div class="group"><div class="Title">Groupe 2</div>
                <div class="person">Personne 1</div>
                <div class="person">Personne 2</div>
                <div class="person">Personne 3</div>
                <div class="person">Personne 4</div>
                <div class="person">Personne 5</div>
            </div>
        </div>

        <div id="other_groups"><div class="Titles">Autres Groupes</div>
            <div class="group"><div class="Title">Groupe 1</div>
                <div class="person">Personne 1</div>
                <div class="person">Personne 2</div>
                <div class="person">Personne 3</div>
                <div class="person">Personne 4</div>
                <div class="person">Personne 5</div>
            </div>
            <div class="group"><div class="Title">Groupe 2</div>
                <div class="person">Personne 1</div>
                <div class="person">Personne 2</div>
                <div class="person">Personne 3</div>
                <div class="person">Personne 4</div>
                <div class="person">Personne 5</div>
            </div>
        </div> -->
    </body>
</html>
