<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);	

include_once "../classes/Database.php";
include_once "../classes/Users.php";



$user = new User($_POST['id_user']);

$id = $user->create_group($_POST['nomgroupe'], $_POST['descgroupe']);
session_start();
$db = Database::connect();
$req=$db->prepare("INSERT INTO membres(id_groupe,id_utilisateur) VALUES (:idgroupe,:idmembre)");
$req->bindParam(':idgroupe', $id);
$req->bindParam(':idmembre', $_SESSION['id']);
$req->execute();


var_dump($_SESSION['id']);
var_dump($user);

/*header("location: groupes.php?id=".$id);*/

 ?>