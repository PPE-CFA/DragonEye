<?php
  include('controleur/controleurAnnonce.php');
  $unC = new ControleurAnnonce("localhost","dragoneye","root","");
  $unC->setTableAnnonce("deye_annonce");
  $resultats = $unC->select_Annonce_recent();
  $resultats_demandes = $unC->select_Demandes();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Dragon's Eye</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php include('include/header.php')?>

<!--- Image centrale--->
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
      <?php include('vue/vue_anonces_accueil.php'); ?>
    </div>
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
      <?php include('vue/vue_demandes_accueil.php'); ?>
    </div>
    <br>
    <a href="offres/offres.php"class="btn btn-primary">Voir plus d'offres</a>
    <hr>
  </div>

</div>
</div>
  <?php include('include/footer.php') ?>
</body>
</html>
