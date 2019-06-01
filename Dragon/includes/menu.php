<!--- Navigation --->
<nav class = "navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src ="img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <?php
                if(!isset($deposerAnnonce)){
                    echo("<li class='nav-item'>");
                        echo("<a class='nav-link' href='annonce.php'>Déposer une annonce</a>");
                    echo("</li>");
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="offres/offres.html">Offres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Demandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="evenement/evenement.php">Evènements</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right ml-auto">
                <li class="nav-item">
                    <?php
                    session_start();

                    $bdd = new PDO('mysql:hostname=213.32.79.219;dbname=dragoneye', "dragoneye", "NeGMzgKL8MlLmdzZ");

                    if (isset($_SESSION["IdPersonne"]) AND $_SESSION["IdPersonne"] > 0) {
                        $requser = $bdd->prepare("SELECT * FROM deye_personne WHERE IdPersonne = ?");
                        $requser->execute(array($_SESSION['IdPersonne']));
                        $user = $requser->fetch();
                        ?>
                        <a href="profil/profil.php" class="btn btn-primary"><?= $user['nom']; ?> <?= $user['prenom']; ?></a>
                        <?php
                    } else {
                        ?>
                        <a href="connexion/inscription.php" class="btn btn-primary">S'inscrire/Se connecter</a>
                        <?php
                    }
                    ?>           
                </li>
            </ul>
        </div>
    </div>
</nav>