<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Dragon Eye's - Accueil</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="css/style.css" rel="stylesheet">
  <link href="css/index_style.css" rel="stylesheet">
</head>

<body>
<!--- Navigation --->
  <!--nav class = "navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src ="img/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" href="annonces/annonce.php">Déposer une annonce</a>
          </li>
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
             /* session_start();

              $bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu', 'root', '');

              if(isset($_SESSION["IdPersonne"]) AND $_SESSION["IdPersonne"] > 0){
                $requser = $bdd->prepare("SELECT * FROM deye_personne WHERE IdPersonne = ?");
                $requser->execute(array($_SESSION['IdPersonne']));
                $user = $requser->fetch();*/
            ?>
              <a href="/profil/profil.php" class="btn btn-primary"><?= $user['nom'];?> <?=$user['prenom'];?></a>
            <?php
            /*
              }else{
             * 
             */
            ?>
                <a href="../connexion/inscription.php" class="btn btn-primary">S'inscrire/Se connecter</a>
            <?php
             // }
            ?>           
					</li>
				</ul>
			</div>
		</div>
  </nav-->
          <?php 
        $deposerAnnonce = null;
        include("includes/menu.php");
        ?>
  

<!--- HEADER--->
<div id="slides" class="carousel slide" date-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#slides" data-slide-to="0"class="active"></li>
      <li data-target="#slides" data-slide-to="1"></li>
    </ul>
<div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/nintendo.jpg">
      <div class="carousel-caption">
          <h1 class="display-2">Dragon's Eye</h1>
          <h3>Echange de jeu en un simple clic !</h3>
          <form class="form-inline form-container">
            <div class="form-group mb-6">
              <input type="text" class="form-control" id="inputgame" placeholder="Rechercher un jeu">
            </div>
            <div class="form-group mx-sm-3 mb-6">
              <label for="inputlieu" class="sr-only">Lieu</label>
              <input type="text" class="form-control" id="inputlieu" placeholder="Lieu">
            </div>
            <button type="submit" class="btn btn-primary">Go !</button>
          </form>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/nintendo.jpg">
      <div class="carousel-caption">
          <h1 class="display-2">Vous avez une annonce?</h1>
          <h3>Venez vite la déposer ici facile et rapide !</h3>
          <button type="submit" class="btn btn-primary">Oui j'ai une annonce !</button>
      </div>
    </div>
</div>
  <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--Section : dernières annonces publiés--->
<div class="container-fluid padding">
<div class="row last_published text-center">
  <div class="col-12">
    <br>
    <h1 class="display-4">Les dernières annonces publiées !</h1>
    <div class="col-12">
      <p class="lead">Retrouver ici les dernières annonces publiées d'offre et de demande d'échange de jeux !</p>
      <hr>
    </div>
  </div>
</div>
</div>

<!--Deux colonnes sections-->

  <!--Dernères Offres-->
<div class="container-fluid padding">
<div class="row text-center padding">
  <div class="last_offers col-12">
    <h2>Offres</h2>
  </div>

    <!--card offre-->
  <div class="container">
    <div class="row padding">

      <div class="col-sm-4">
        <div class="card">
          <div class="img-jeu">
          <img src="img/trone.jpg" class="thumbnail" alt="article">
          </div>
          <hr>
            <div class="card-body">
              <h4 class="card-title">Nom du jeu</h4>
              <p class="card-text"><i class="fas fa-gamepad"></i> Type de jeu</p>
              <p class="card-text"><i class="fas fa-map-marker-alt"></i> Lieu</p>
              <p class="card-text"><i class="fas fa-users"></i> Age</p>
              <a href="#" class="btn btn-outline-secondary">Voir plus</a>
            </div>
          </div>
        </div>

      <div class="col-sm-4">
        <div class="card">
          <div class="img-jeu">
          <img src="img/takenoko.jpg" class="thumbnail" alt="article">
          </div>
          <hr>
            <div class="card-body">
              <h4 class="card-title">Darsiders</h4>
              <p class="card-text"><i class="fas fa-gamepad"></i> Type de jeu</p>
              <p class="card-text"><i class="fas fa-map-marker-alt"></i> Lieu</p>
              <p class="card-text"><i class="fas fa-users"></i> Age</p>
              <a href="#" class="btn btn-outline-secondary">Voir plus</a>
            </div>
          </div>
        </div>

      <div class="col-sm-4">
        <div class="card">
          <div class="img-jeu">
          <img src="img/takenoko.jpg" class="thumbnail" alt="article">
          </div>
          <hr>
            <div class="card-body">
              <h4 class="card-title">Wow</h4>
              <p class="card-text"><i  class="fas fa-gamepad"></i> Type de jeu</p>
              <p class="card-text"><i  class="fas fa-map-marker-alt"></i> Lieu</p>
              <p class="card-text"><i  class="fas fa-users"></i> Age</p>
              <a href="#" class="btn btn-outline-secondary">Voir plus</a>
            </div>
          </div>
        </div>
      </div>
        <br>
        <a href="connect/sign.html"class="btn btn-primary">Voir plus d'offres</a>
        <hr>
     </div>
</div>
</div>

<!---Dernières demandes-->
<div class="container-fluid padding">
<div class="row text-center padding">
  <div class="last_offers col-12">
    <h2>Demandes</h2>
  </div>

    <!--card offre-->
  <div class="container">
    <div class="row padding">

      <div class="col-sm-4">
        <div class="card">
          <div class="img-jeu">
          <img src="img/takenoko.jpg" class="thumbnail" alt="article">
          </div>
          <hr>
            <div class="card-body">
              <h4 class="card-title">Nom du jeu</h4>
              <p class="card-text"><i  class="fas fa-gamepad"></i> Type de jeu</p>
              <p class="card-text"><i  class="fas fa-map-marker-alt"></i> Lieu</p>
              <p class="card-text"><i  class="fas fa-users"></i> Age</p>
              <a href="#" class="btn btn-outline-secondary">Voir plus</a>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card">
            <div class="img-jeu">
            <img src="img/takenoko.jpg" class="thumbnail" alt="article">
            </div>
            <hr>
              <div class="card-body">
                <h4 class="card-title">Nom du jeu</h4>
                <p class="card-text"><i  class="fas fa-gamepad"></i> Type de jeu</p>
                <p class="card-text"><i  class="fas fa-map-marker-alt"></i> Lieu</p>
                <p class="card-text"><i  class="fas fa-users"></i> Age</p>
                <a href="#" class="btn btn-outline-secondary">Voir plus</a>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <div class="img-jeu">
              <img src="img/takenoko.jpg" class="thumbnail" alt="article">
              </div>
              <hr>
                <div class="card-body">
                  <h4 class="card-title">Nom du jeu</h4>
                  <p class="card-text"><i  class="fas fa-gamepad"></i> Type de jeu</p>
                  <p class="card-text"><i  class="fas fa-map-marker-alt"></i> Lieu</p>
                  <p class="card-text"><i  class="fas fa-users"></i> Age</p>
                  <a href="#" class="btn btn-outline-secondary">Voir plus</a>
                </div>
              </div>
            </div>

      </div>
      <br>
      <a href="connect/sign.html"class="btn btn-primary">Voir plus de demandes</a>
      <hr>
    </div>

</div>
</div>


<!---Bas de page-->
<br/>
<br/>
<footer>
<div class="container-fluid padding">
<div class="row text-center">
  <div class="col-md-4">
    <img src="img/logo.png">
    <hr class="light">
    <p>phone</p>
    <p>email</p>
    <p>adresse</p>
    <div class="social">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
  </div>

  <div class="col-md-4">
    <i class="fas fa-table"></i>
    <h5>Horaire</h5>
    <hr class="light">
    <p>lundi</p>
    <p>mardi</p>
    <p>mercredi</p>
    <p>jeudi</p>
    <p>vendredi</p>
    <p>samedi</p>
    <p>dimanche</p>
  </div>

  <div class="col-md-4">
    <img src="img/focus_home_interactive_logo.svg" class="partenaire_logo" alt="partenaire">
    <img src="img/novatim_logo.png" class="partenaire_logo" alt="article">
  </div>


  <div class="col-12">
    <hr class="light">
    <h5>&copy; Dragon's Eye</h5>
  </div>

</div>
</div>
</footer>

</body>
</html>