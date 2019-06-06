<?php
  //include('controleur/controleurAnnonce.php');
  //$unC = new ControleurAnnonce("213.32.79.219","dragoneye","dragoneye"/*dragoneye*/,"NeGMzgKL8MlLmdzZ"/*NeGMzgKL8MlLmdzZ*/);/*dragoneye*/
  //$unC = new ControleurAnnonce("localhost","dragoneye","root","");
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
  <link href="css/index_style.css" rel="stylesheet">
</head>

<body>
<?php 
  include('include/header.php');
  include(_DIR2_.'/controleur/controleurOffre.php');
  include(_DIR2_.'/controleur/controleurDemande.php');
  $unC_offre = new ControleurOffre($host, $bdd_nom, $bdd_user, $mdp);
  $unC_demande = new controleurDemande($host, $bdd_nom, $bdd_user, $mdp);
  $stmt_allLastOffre = $unC_offre->select_allLastOffre();
  $stmt_allLastDemande = $unC_demande->select_allLastDemande();
?>

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
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/nintendo.jpg">
      <div class="carousel-caption">
          <h1 class="display-2">Vous avez une annonce?</h1>
          <h3>Venez vite la déposer ici facile et rapide !</h3>
          <a href="annonce.php" class="btn btn-primary">Oui j'ai une annonce !</a>
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
      <!--card offre-->
    <?php while($res = $stmt_allLastOffre->fetch()){?>

      <div class="col-sm-4">
        <div class="card">
          <div class="img-jeu">
          <img src="<?=_DIR_.$res['url_photo']?>" class="thumbnail" alt="offres">
          </div>
          <hr>
            <div class="card-body">
              <h4 class="card-title"><?=$res['designation']?></h4>
              <p class="card-text"><i class="fas fa-gamepad"></i> <?=$res['libelle']?></p>
              <p class="card-text"><i class="fas fa-map-marker-alt"></i> <?=$res['region']?>, <?=$res['ville']?>  </p>
              <p class="card-text"><i class="fas fa-users"></i> <?=$res['age_requis']?></p>
              <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal<?= $res['IdAnnonce'] ?>">Voir plus</button>
            </div>
          </div>
        </div>

        <!-- Modal -->
<div id="myModal<?= $res['IdAnnonce'] ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><img src="<?=_DIR_?>img/logo.png"> Offre - <?=$res['designation']?></h4>
        <h6 class="modal-subtitle"><?=$res['region']?>, <?=$res['ville']?>, <?=$res['postal']?></h6>
        
      </div>
      
      <!--Modal Body-->
      <div class="modal-body">
        
        <div class="img-ad">
          <img src = "<?=_DIR_.$res['url_photo']?>"/>
        </div>


        <div class="description-ad">

          <h5>Categorie</h5>
          <?=$res['libelle']?>
          <h5>Age</h5>
          <?=$res['age_requis']?>
          <h5>Etat du jeu </h5> 
          <?=$res['Etat']?>
          <h5>Description </h5>
          <p><?=$res['Description']?></p>
          <h5>De <?=$res['nom']?> <?=$res['prenom']?></h5>
          Posté le : <?=$res['Depot']?>

        
        </div>
        
      </div>

    

      <!--Modal Footer-->
      <div class="modal-footer">


        <!--Affiche les coordonnées si l'utilisateur est connecté sinon le dirige vers la page de connection/inscription-->
        <?php

          if(isset($_SESSION['IdPersonne']))
          {
        ?>
          
            <button type="button" class="btn btn-outline-secondary"><?=$res['email']?> </button>
        
        <?php

          }else{
        ?>
            <a href="../connexion/inscription.php" class="btn btn-secondary"><i class="fas fa-id-card"></i> Obtenir les coordonnées</a>  

        <?php    
          }
        ?>

      </div>
    </div>

        </div>
      </div>

      <?php
        }
      ?>


    </div>
    <br>
      <a href="offres/offres.php"class="btn btn-primary">Voir plus d'offres</a>
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
      <!--card offre-->
    <?php while($res = $stmt_allLastDemande->fetch()){?>
      <div class="col-sm-4">
        <div class="card">
          <div class="img-jeu">
          <img src="<?=_DIR_.$res['url_photo']?>" class="thumbnail" alt="offres">
          </div>
          <hr>
            <div class="card-body">
              <h4 class="card-title"><?=$res['designation']?></h4>
              <p class="card-text"><i class="fas fa-gamepad"></i> <?=$res['libelle']?></p>
              <p class="card-text"><i class="fas fa-map-marker-alt"></i> <?=$res['region']?>, <?=$res['ville']?>  </p>
              <p class="card-text"><i class="fas fa-users"></i> <?=$res['age_requis']?></p>
              <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal<?= $res['IdAnnonce'] ?>">Voir plus</button>
            </div>
          </div>
        </div>

<!-- Modal -->
<div id="myModal<?= $res['IdAnnonce'] ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><img src="<?=_DIR_?>/img/logo.png"> Offre - <?=$res['designation']?></h4>
        <h6 class="modal-subtitle"><?=$res['region']?>, <?=$res['ville']?>, <?=$res['postal']?></h6>
        
      </div>
      
      <!--Modal Body-->
      <div class="modal-body">
        
        <div class="img-ad">
          <img src="<?=_DIR_.$res['url_photo']?>"/>
        </div>


        <div class="description-ad">

          <h5>Categorie</h5>
          <?=$res['libelle']?>
          <h5>Age</h5>
          <?=$res['age_requis']?>
          <h5>Etat du jeu </h5> 
          <?=$res['Etat']?>
          <h5>Description </h5>
          <p><?=$res['Description']?></p>
          <h5>De <?=$res['nom']?> <?=$res['prenom']?></h5>
          Posté le : <?=$res['Depot']?>

        
        </div>
        
      </div>

    

      <!--Modal Footer-->
      <div class="modal-footer">


        <!--Affiche les coordonnées si l'utilisateur est connecté sinon le dirige vers la page de connection/inscription-->
        <?php

          if(isset($_SESSION['IdPersonne']))
          {
        ?>
          
            <button type="button" class="btn btn-outline-secondary"><?=$res['email']?> </button>
        
        <?php

          }else{
        ?>
            <a href="../connexion/inscription.php" class="btn btn-secondary"><i class="fas fa-id-card"></i> Obtenir les coordonnées</a>  

        <?php    
          }
        ?>

      </div>
    </div>

    </div>
  </div>

      <?php
        }
      ?>
    </div>
    <br>
    <a href="demandes/demandes.php"class="btn btn-primary">Voir plus de demandes</a>
    <hr>
  </div>

</div>
</div>
  <?php include('include/footer.php') ?>
</body>
</html>
