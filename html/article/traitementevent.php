<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../../classes/Database.php";

session_start();



$db = Database::connect();


$req = $db->prepare("INSERT INTO evenements (id_evenement, id_proprio, id_theme, nom, date, heure, description, lieu) VALUES (NULL, :id_proprio, :id_theme, :nom, :date, :time, :description, :place)");
$req->bindParam(':nom', $_POST['nom']);
$req->bindParam(':id_proprio', $_SESSION['id']);
$req->bindParam(':id_theme', $_POST['type']);
$req->bindParam(':date', $_POST['date']);
$req->bindParam(':time', $_POST['time']);
$req->bindParam(':description', $_POST['description']);
$req->bindParam(':place', $_POST['place']);
$req->execute();

var_dump($_POST['time']);
var_dump($req);

$id=$db->lastInsertId();

$idpersonne=$_SESSION['id'];





	$banane='imagearticle/'.$id.'.png';

    $req4=$db->prepare("INSERT INTO imageevent(chemin,id_image) VALUES (:lien,NULL)");
    $req4->bindParam(":lien",$banane);
    $req4->execute();

 


		


if ($_FILES['icone']['error'] > 0) $erreur = "Erreur lors du transfert";


$image_sizes = getimagesize($_FILES['icone']['tmp_name']);
	

 
//Créer un identifiant difficile à deviner
  $nom = md5(uniqid(rand(), true));

  $nom = 'imagearticle/'.$id.'.png';
$resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$nom);
if ($resultat) echo "Transfert réussi";



$req5=$db->prepare("INSERT INTO contientimage(id_event, id_image) VALUES (:event, :image)");
$req5->bindParam(':event', $id);
$req5->bindParam(':image', $nbr);
$req5->execute();







header('Location:../accueil.php?id='.$idpersonne.'');






?>
