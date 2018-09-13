<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);	

include_once "../classes/Database.php";
include_once "../classes/Users.php";



$user = new User($_POST['id_user']);

$id = $user->create_group($_POST['nomgroupe'], $_POST['descgroupe']);



header("location: groupes.php?id=".$id);

 ?>