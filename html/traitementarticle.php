<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../classes/Database.php";

session_start();



$db = Database::connect();

$date = date("Y-m-d");

$req = $db->prepare("INSERT INTO articles (id_article, id_auteur, titre, texte, date, sujet) VALUES (NULL, :auteur, :titre, :texte, :date, :sujet)");
$req->bindParam(':titre', $_POST['nom']);
$req->bindParam(':auteur', $_SESSION['id']);
$req->bindParam(':sujet', $_POST['type']);
$req->bindParam(':date', $date) ;
$req->bindParam(':texte', $_POST['description']);
$req->execute();


var_dump($req);

$id=$db->lastInsertId();


$idpersonne=$_SESSION['id'];
var_dump($id);





	$banane='imagearticles/'.$id.'.png';

    $req4=$db->prepare("INSERT INTO imagearticle(chemin,id_image) VALUES (:lien,NULL)");
    $req4->bindParam(":lien",$banane);
    $req4->execute();

 


		


if ($_FILES['icone']['error'] > 0) $erreur = "Erreur lors du transfert";


$image_sizes = getimagesize($_FILES['icone']['tmp_name']);
	

 
//Créer un identifiant difficile à deviner
  $nom = md5(uniqid(rand(), true));

  $nom = 'imagearticles/'.$id.'.png';
$resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$nom);
if ($resultat) echo "Transfert réussi";



$req5=$db->prepare("INSERT INTO contientimage(id_event, id_image) VALUES (:event, :image)");
$req5->bindParam(':event', $id);
$req5->bindParam(':image', $nbr);
$req5->execute();







header('Location:../accueil.php?id='.$idpersonne.'');






?>
