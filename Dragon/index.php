<?php

  $bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu;charset=utf8', 'root', '');

  $lastOffers = $bdd->query('SELECT IdAnnonce, deye_jeux.designation, deye_annonce_type.AnnonceType, deye_personne.nom, deye_photo.url_photo,
                            deye_age.age_requis, deye_categorie.libelle, deye_annonce.Description,region,ville,postal,Etat,deye_personne.prenom,
                            deye_jeux.prix, deye_jeux.date_sortie, deye_jeux.nb_joueurs, deye_jeux.temps_jeux, deye_personne.email
                            FROM deye_annonce
                            INNER JOIN deye_jeux     ON deye_annonce.IdJeux=deye_jeux.IdJeux
                            INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
                            INNER JOIN deye_annonce_type ON deye_annonce.Idforme = deye_annonce_type.IdA_type
                            INNER JOIN deye_photo    ON deye_annonce.IdPhoto=deye_photo.IdPhoto
                            INNER JOIN deye_age      ON deye_annonce.IdAge=deye_age.IdAge
                            INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
                            WHERE Idforme = "O"
                            ORDER BY IdAnnonce DESC 
                            LIMIT 0,3');

$lastDemands = $bdd->query('SELECT IdAnnonce, deye_jeux.designation, deye_annonce_type.AnnonceType, deye_personne.nom, deye_photo.url_photo,
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
                            ORDER BY IdAnnonce DESC 
                            LIMIT 0,3');

?>

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
  <nav class = "navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src ="img/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Déposer une annonce</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="offres/offres.php">Offres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="demandes/demandes.php">Demandes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="evenement/evenement.php">Evènements</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-right ml-auto">
          <li class="nav-item">
          <?php
              session_start();

              $bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu;charset=utf8', 'root', '');

              if(isset($_SESSION["IdPersonne"]) AND $_SESSION["IdPersonne"] > 0){
                $requser = $bdd->prepare("SELECT * FROM deye_personne WHERE IdPersonne = ?");
                $requser->execute(array($_SESSION['IdPersonne']));
                $user = $requser->fetch();
            ?>
              <a href="../profil/profil.php" class="btn btn-primary"><?= $user['nom'];?> <?=$user['prenom'];?></a>
            <?php
              }else{
            ?>
                <a href="../connexion/inscription.php" class="btn btn-primary">S'inscrire/Se connecter</a>
            <?php
              }
            ?>           
					</li>
				</ul>
			</div>
		</div>
  </nav>

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
  
  <?php while($res = $lastOffers->fetch()){?>
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
    <br>
    <hr>
    <a href="offres/offres.php" class="btn btn-primary">Voir plus d'offre</a>
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

<!---Dernières demandes-->
<div class="container-fluid padding">
<div class="row text-center padding">
  <div class="last_offers col-12">
    <h2>Demandes</h2>
  </div>
<!--card demande-->
  
<?php while($resD = $lastDemands->fetch()){?>
  <div class="container">
    <div class="row padding">

      <div class="col-sm-4">
        <div class="card">
          <div class="img-jeu">
          <img src="<?=$resD['url_photo']?>" class="thumbnail" alt="offres">
          </div>
          <hr>
            <div class="card-body">
              <h4 class="card-title"><?=$resD['designation']?></h4>
              <p class="card-text"><i class="fas fa-gamepad"></i> <?=$resD['libelle']?></p>
              <p class="card-text"><i class="fas fa-map-marker-alt"></i> <?=$resD['region']?>, <?=$resD['ville']?>  </p>
              <p class="card-text"><i class="fas fa-users"></i> <?=$resD['age_requis']?></p>
              <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal2">Voir plus</button>
            </div>
          </div>
        </div>
     
    

    </div>
    <br>
    <hr>
    <a href="demandes/demandes.php" class="btn btn-primary">Voir plus de demandes</a>
    </div>





<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><img src="../../img/logo.png"> Offre - <?=$resD['designation']?></h4>
        <h6 class="modal-subtitle"><?=$resD['region']?>, <?=$resD['ville']?>, <?=$resD['postal']?></h6>
        
      </div>
      
      <!--Modal Body-->
      <div class="modal-body">
        
        <div class="img-ad">
          <img src="../img/nature3.jpg"/>
          <?=$resD['designation']?>
        </div>


        <div class="description-ad">

          <h5>Categorie</h5>
          <?=$resD['libelle']?>
          <h5>Age</h5>
          <?=$resD['age_requis']?>
          <h5>Etat du jeu </h5> 
          <?=$resD['Etat']?>
          <h5>Description </h5>
          <p><?=$resD['Description']?></p>
          <h5>De <?=$resD['nom']?> <?=$resD['prenom']?></h5>
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
          
            <button type="button" class="btn btn-outline-secondary"><?=$resD['email']?> </button>
        
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