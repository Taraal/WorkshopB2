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

function afficher_coeur($id_envent)
{
    $db = Database::connect();
    $req = $db->prepare("select * from participe where id_utilisateur=:id_user and id_evenement=:id_event");
    $req->bindParam(':id_event', $id_envent);
    $req->bindParam(':id_user', $_SESSION['id']);
    $req->execute();
    $result = $req->fetchall();
    if (!$result){
        $img= "<img class='Heart' src='medias/like_empty.png' onmouseover='this.src=`medias/like_full.png`'onmouseout='this.src=`medias/like_empty.png`'>";
    }
    else{
        $img= "<img class='Heart' src='medias/like_full.png' onmouseover='this.src=`medias/like_empty.png`'onmouseout='this.src=`medias/like_full.png`'>";
    }
    return $img;
    
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="workshop">
    <link rel="icon" href="medias/fav.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>


    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Assistant|M+PLUS+1p|Pacifico" rel="stylesheet">


    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">

    <title>Mes Events</title>
</head>

<body>
    <?php include_once("navbar.php"); ?>


</body>
</html>