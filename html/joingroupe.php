<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
include_once "../classes/Users.php";
include_once "../classes/Database.php";

$id_user = $_SESSION['id'];
$id_groupe = $_POST['idgroupe'];

$user = new User($id_user);

$user->join_group($id_groupe);

header('location: mongroupe.php?id=' . $id_groupe);






?>
