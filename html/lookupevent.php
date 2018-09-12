<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../classes/Database.php";
include_once "../classes/Evenements.php";

if(isset($_GET['tri']){

    if($_GET['tri'] == "all"){

        $results = Evenements::get_all_events();

    } 
    else{
        
        $results = Evenements::get_specific_events($_GET['tri']);

    }


header('location: url' .$results);

}



?>

