<?php 
include_once "../classes/Database.php";
include_once "../classes/Users.php";

?>
<div id="header">
    <div id="title">Patatoïde</div>
    <div id="profile"><?php echo $user->get_nom(); ?> <?php echo $user->get_prenom(); ?></div>
    <div id="profile"><a href="deconnexion.php">Se déconnecter</a></div>
</div>
