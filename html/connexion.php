<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include_once "../classes/Database.php";

if (isset($_POST['email']) && isset($_POST['mdp'])){

    Database::testconnection($_POST['email'], $_POST['mdp']);

}

else {
    header("location: index.php"); 
}
