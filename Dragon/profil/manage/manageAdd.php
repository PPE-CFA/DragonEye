<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Dragon's Eye - Edit Annonce</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/manageAdd_style.css" rel="stylesheet">
</head>

<body>
<!--- Navigation --->
  <nav class = "navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php"><img src ="../../img/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Déposer une annonce</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Offres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Demandes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Evènements</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-right ml-auto">
          <li class="nav-item">
            <?php
              session_start();

              $bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu', 'root', '');

              if(isset($_SESSION["IdPersonne"]) AND $_SESSION["IdPersonne"] > 0){
                $requser = $bdd->prepare("SELECT * FROM deye_personne WHERE IdPersonne = ?");
                $requser->execute(array($_SESSION['IdPersonne']));
                $user = $requser->fetch();
            ?>
              <a href="../../profil/profil.php" class="btn btn-primary"><?= $user['nom'];?> <?=$user['prenom'];?></a>
            <?php
              }else{
            ?>
                <a href="../../connexion/inscription.php" class="btn btn-primary">S'inscrire/Se connecter</a>
            <?php
              }
            ?>            
		    </li>
			</ul>
		</div>
		</div>
  </nav>
  
<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu;charset=utf8', 'root', '');

  //requete SQL : supprime une annonce de la table deye_annonce
  if(isset($_SESSION['IdType']) AND $_SESSION['IdType'] == "A"){

    if(isset($_GET['type']) AND $_GET['type'] == 'alladd') {
        
            
      if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
        
        $supprime = (int) $_GET['supprime'];
        $req = $bdd->prepare('DELETE FROM deye_annonce WHERE IdAnnonce = ?');
        $req->execute(array($supprime));

      }
    }

  }else{

    exit();
  }

  $allAdd = $bdd->query('SELECT IdAnnonce, deye_jeux.designation, deye_personne.nom, deye_photo.url, deye_age.age_requis, deye_categorie.libelle, deye_annonce.Description,région,ville,postal,Etat
                          FROM deye_annonce
                          INNER JOIN deye_jeux     ON deye_annonce.IdJeux=deye_jeux.IdJeux
                          INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
                          INNER JOIN deye_photo    ON deye_annonce.IdPhoto=deye_photo.IdPhoto
                          INNER JOIN deye_age      ON deye_annonce.IdAge=deye_age.IdAge
                          INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
                          ORDER BY IdAnnonce DESC');




?>


<!--- Tableau  de toutes les annonces avec bouton supprimer-->

              <div class="container-fluid padding">     
              <div class="row text-center padding">

  

                <div class="container allAdd">
                <div class="row">

                <table class="table">
                <h2>Toutes les Annonces </h2> 
                <thead>
                <th>Id</th>
                <th>Jeux</th>
                <th>Personne</th>
                <th>Photo</th>
                <th>Age</th>
                <th>Catégorie</th>
                <th>Région</th>
                <th>Ville</th>
                <th>Code postal</th>
                <th>Etat</th>
                <th>Description</th>
                <th>Editer</th>
                
                </thead>
                <tbody>
                  <?php while($res = $allAdd->fetch()){?>
                  <tr class="table-info">
                        
                        <td>
                            <?=$res['IdAnnonce']?>
                        </td>

                        <td>
                            <?=$res['designation']?>
                        </td>

                        <td>
                            <?=$res['nom']?>
                        </td>

                        <td>
                            <?=$res['url']?>
                        </td>

                        <td>
                            <?=$res['age_requis']?>
                        </td>

                        <td>
                            <?=$res['libelle']?>
                        </td>

                        <td>
                            <?=$res['région']?>
                        </td>

                        <td>
                            <?=$res['ville']?>
                        </td>

                        <td>
                            <?=$res['postal']?>
                        </td>

                        <td>
                            <?=$res['Etat']?>
                        </td>

                        <td>
                            <?=$res['Description']?>
                        </td>

                        <td>   
                            
                            <a href="manageAdd.php?type=alladd&supprime=<?= $res['IdAnnonce'] ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                                
                    
                    
                  </tr>
                    <?php
                    }
                    ?>
                  </tbody>

                </table>

                </div>
                </div>

                <div class="container button-end">
                <a href="../../profil/admin.php" class="btn btn-secondary">Revenir en arrière</a>
                <a href="../../connexion/deconnexion.php" class="btn btn-danger">Me déconnecter</a>
                </div>

                </div>
                </div>
  




<!---Bas de page-->

<footer>
<div class="container-fluid padding">
<div class="row text-center">
  <div class="col-md-4">
    <img src="../../img/logo.png">
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
    <img src="../../img/focus_home_interactive_logo.svg" class="partenaire_logo" alt="partenaire">
    <img src="../../img/novatim_logo.png" class="partenaire_logo" alt="article">
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