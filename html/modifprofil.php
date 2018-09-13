<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../classes/Database.php";

session_start();

$id=$_SESSION['id'];

$db = Database::connect();

$req=$db->prepare("UPDATE utilisateurs SET nom=:nom WHERE id_utilisateur=$id");
$req->bindParam(':nom',$_POST['Family_Name']);
$req->execute();

$req=$db->prepare("UPDATE utilisateurs SET prenom=:prenom WHERE id_utilisateur=$id");
$req->bindParam(':prenom',$_POST['Name']);
$req->execute();

$req=$db->prepare("UPDATE utilisateurs SET email=:mail WHERE id_utilisateur=$id");
$req->bindParam(':mail',$_POST['Mail']);
$req->execute();

$req=$db->prepare("UPDATE utilisateurs SET date_naissance=:daten WHERE id_utilisateur=$id");
$req->bindParam(':daten',$_POST['daten']);
$req->execute();

$_SESSION['nom']=$_POST['Family_Name'];
$_SESSION['prenom']=$_POST['Name'];


header('Location:profil.php');

?>