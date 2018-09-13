<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../classes/Database.php";

session_start();

$db = Database::connect();


	$req = $db->prepare("INSERT INTO commentaires (id_commentaire, id_evenement, id_utilisateur,  texte) VALUES (NULL, :evenement, :utilisateur, :texte)");
	$req->bindParam(':evenement',$_POST['id']);
	$req->bindParam(':utilisateur',$_SESSION['id']);

	$req->bindParam(':texte',$_POST['comment']);
	$req->execute();

$id = $_POST['id'];


	header("Location:evenement.php?id=".$id);



?>