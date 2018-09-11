<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../../classes/Database.php";

session_start();



$db = Database::connect();

$req = $db->prepare("INSERT INTO evenements (id_evenement, id_proprio,  nom, date, heure, description, lieu) VALUES (NULL, :id_proprio, :nom, :date, :time, :description, :place)");
$req->bindParam(':nom', $_POST['nom']);
$req->bindParam(':id_proprio', $_SESSION['id']);
$req->bindParam(':date', $_POST['date']);
$req->bindParam(':time', $_POST['time']);
$req->bindParam(':description', $_POST['description']);
$req->bindParam(':place', $_POST['place']);
$req->execute();


header('location: ../accueil.php');



?>
