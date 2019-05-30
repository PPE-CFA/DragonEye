<?php include('sec.php')?>
<!--- Navigation --->
<nav class = "navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?=_DIR_?>/index.php"><img class="deye_logo" src ="<?=_DIR_?>/img/logo3.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?=_DIR_?>/annonce.php">Déposer une annonce</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=_DIR_?>/offres/offres.php">Offres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=_DIR_?>/demandes/demandes.php">Demandes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=_DIR_?>/evenement/evenement.php">Evènements</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-right ml-auto">
          <li class="nav-item">
          <?php
              if (session_status() == PHP_SESSION_NONE) {
                session_start();
              }

              $bdd = new PDO('mysql:hostname=213.32.79.219;dbname=dragoneye;charset=utf8', "dragoneye", "NeGMzgKL8MlLmdzZ");

              if(isset($_SESSION["IdPersonne"]) AND $_SESSION["IdPersonne"] > 0){
                $requser = $bdd->prepare("SELECT * FROM deye_personne WHERE IdPersonne = ?");
                $requser->execute(array($_SESSION['IdPersonne']));
                $user = $requser->fetch();
            ?>
              <a href="<?=_DIR_?>/profil/profil.php" class="btn btn-primary"><?= $user['nom'];?> <?=$user['prenom'];?></a>
            <?php
              }else{
            ?>
                <a href="<?=_DIR_?>/connexion/inscription.php" class="btn btn-primary">S'inscrire/Se connecter</a>
            <?php
              }
            ?>            
					</li>
				</ul>
			</div>
		</div>
  </nav>