<?php 
include_once "../classes/Database.php";
include_once "../classes/Users.php";

?>
<div id="header">
    <a href="accueil.php"><div id="title">Patatoïde</div></a>
    <a href="profil.php"><div id="profile"><?php echo $user->get_nom(); ?> <?php echo $user->get_prenom(); ?></div></a>
    <div id="profile"><a href="deconnexion.php">Se déconnecter</a></div>
</div>
