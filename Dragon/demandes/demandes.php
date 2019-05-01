<!-- Requete SQL : affiche toutes les données des offres de la table annonce -->

<?php

  $bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu;charset=utf8', 'root', '');

  $allOffers = $bdd->query('SELECT IdAnnonce, deye_jeux.designation, deye_annonce_type.AnnonceType, deye_personne.nom, deye_photo.url_photo,
                           deye_age.age_requis, deye_categorie.libelle, deye_annonce.Description,region,ville,postal,Etat,deye_personne.prenom,
                           deye_jeux.prix, deye_jeux.date_sortie, deye_jeux.nb_joueurs, deye_jeux.temps_jeux, deye_personne.email
                            FROM deye_annonce
                            INNER JOIN deye_jeux     ON deye_annonce.IdJeux=deye_jeux.IdJeux
                            INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
                            INNER JOIN deye_annonce_type ON deye_annonce.Idforme = deye_annonce_type.IdA_type
                            INNER JOIN deye_photo    ON deye_annonce.IdPhoto=deye_photo.IdPhoto
                            INNER JOIN deye_age      ON deye_annonce.IdAge=deye_age.IdAge
                            INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
                            

                            WHERE Idforme = "D"
                            ORDER BY IdAnnonce DESC');




?>


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
<?php include('../include/header.php') ?>
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

            
    <!--card offre-->
  
  <?php while($res = $allOffers->fetch()){?>
  <div class="container">
    <div class="row padding">

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
              <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal">Voir plus</button>
            </div>
          </div>
        </div>
     
    

    </div>
    </div>





<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
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
            <a href="../../connexion/inscription.php" class="btn btn-secondary"><i class="fas fa-id-card"></i> Obtenir les coordonnées</a>  

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

  <?php include('../include/footer.php') ?>
</body>
</html>


