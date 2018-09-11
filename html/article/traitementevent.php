<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../../classes/Database.php";

session_start();



$db = Database::connect();

$req = $db->prepare("INSERT INTO evenements (id_Evenement, Nom, `Date`, Description, Lieu) VALUES (Null, :nom, `:date`, :descrition :place)");
$req->bindParam(':nom', $_POST['nom']);
$req->bindParam(':date', $_POST['date']);
$req->bindParam(':description', $_POST['description']);
$req->bindParam(':place', $_POST['place']);
$req->execute();





?>