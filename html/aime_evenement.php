<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../classes/Database.php";

session_start();



$db = Database::connect();

$req = $db->prepare("select * from participe where id_utilisateur=:id_user and id_evenement=:id_event");
$req->bindParam(':id_event',  $_GET['id_event']);
$req->bindParam(':id_user', $_SESSION['id']);
$req->execute();
$result = $req->fetchall();
var_dump($result);

if (!$result){
    $req = $db->prepare("INSERT INTO `participe` (`id_utilisateur`, `id_evenement`) VALUES (:id_user, :id_event)");
    $req->bindParam(':id_event', $_GET['id_event']);
    $req->bindParam(':id_user', $_SESSION['id']);
    $req->execute();
}
else{
    $req = $db->prepare("DELETE FROM `participe` WHERE `participe`.`id_utilisateur` = :id_user AND `participe`.`id_evenement` = :id_event");
    $req->bindParam(':id_event', $_GET['id_event']);
    $req->bindParam(':id_user', $_SESSION['id']);
    $req->execute();
}




header('Location:dashboard.php');


?>