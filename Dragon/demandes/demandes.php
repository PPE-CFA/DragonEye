<!-- Requete SQL : affiche toutes les données des offres de la table annonce -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Dragon's Eye - Les offres</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/offres_style.css" rel="stylesheet">
  <link href="demandes_script.js">
</head>

<body>
<?php 
  include('../include/header.php');
  //page specific controller
  include(_DIR2_.'/controleur/controleurDemande.php');
  $unC_demande = new ControleurDemande($host, $bdd_nom, $user, $mdp);
  $stmt_allDemande = $unC_demande->select_allDemande();
?>
  <header>
          
          <div class="container-fluid padding">
          <div class="row">
          <div class="col-md-12">
          <div class="offers-filter">
            <img src="../img/header.jpg"/>
          </div>
        </div>
        </div>
        </div>
      

  </header>



  <!--Toutes les Offres-->
<div class="container-fluid padding card_ad">
<div class="row text-center padding">
  <div class="card_offers_title col-12">
    <h2>Les demandes</h2>
  </div>

  <div class="container">
    <div class="row padding">       
    <!--card offre-->
    <?php while($res = $stmt_allDemande->fetch()){?>
      <div class="col-sm-4">
        <div class="card">
          <div class="img-jeu">
          <img src="<?=$res['url_photo']?>" class="thumbnail" alt="offres">
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
        <h4 class="modal-title"><img src="../../img/logo.png"> Offre - <?=$res['designation']?></h4>
        <h6 class="modal-subtitle"><?=$res['region']?>, <?=$res['ville']?>, <?=$res['postal']?></h6>
        
      </div>
      
      <!--Modal Body-->
      <div class="modal-body">
        
        <div class="img-ad">
          <img src="../img/nature3.jpg"/>
          <!--popover
          <a href="#" title="Fiche de <?=$res['designation']?>" data-toggle="popover" data-trigger="focus" data-img="<?=$res['url_photo']?>" ></a>-->
          
          <?=$res['designation']?>
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
          Posté le : ...

        
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
</div>
</div>
</div>

  <?php include('../include/footer.php') ?>
</body>
</html>


