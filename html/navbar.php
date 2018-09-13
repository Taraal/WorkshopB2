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
                    <a class="nav-link" href="javascript:void(0)">Creer events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Groupes</a>
                </li>
            </ul>

            <div class="dropdown my-2 my-lg-0">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <?php echo $user->get_nom(), " ", $user->get_prenom(); ?>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profil.php">Mon profil</a>
                    <a class="dropdown-item" href="index.php">Se deconnecter</a>
                </div>
            </div>

    </nav>