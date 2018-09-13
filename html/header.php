<?php 
include_once "../classes/Database.php";
include_once "../classes/Users.php";


$pseudo=$_SESSION['prenom'].' '.$_SESSION['nom'];

?>



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> <!--

        <-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/header.css">



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="dashboard.php">Patatoïde</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navb">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="mesevents.php">Mes events</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="groupes.php">Groupes</a>
      </li>



      <div class="dropdown my-2 my-lg-0 ">
  		<button type="button" class="btn btn-default dropdown-toggle menu" data-toggle="dropdown">
    		Creer événement/article
  		</button>
  		<div class="dropdown-menu">
    		<a class="dropdown-item" href="creationarticle.php">Creer événement</a>
    		<a class="dropdown-item" href="creaarticle.php">Creer article</a>
  </div>
</div>
      
    </ul>

    <div class="dropdown my-2 my-lg-0">
  		<button type="button" class="btn btn-primary dropdown-toggle john" data-toggle="dropdown">
    		<?php echo $pseudo;?>
  		</button>
  	<div class="dropdown-menu">
    	<a class="dropdown-item smith" href="profil.php">Mon profil</a>
    	<a class="dropdown-item smith" href="deconnexion.php">Se deconnecter</a>
  </div>
</div>

</nav>











<!-- 

<div id="header">
    <a href="accueil.php"><div id="title">Patatoïde</div></a>
    <a href="profil.php"><div id="profile"></div></a>
    <div id="profile"><a href="deconnexion.php">Se déconnecter</a></div>
</div>
 -->