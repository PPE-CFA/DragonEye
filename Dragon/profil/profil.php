<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Dragon Eye's - Mon Profil</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/profil_style.css" rel="stylesheet">
</head>

<body>
<?php include('../include/header.php') ?>

  <div class="container-fluid padding">
  <div class="row text-center padding">
    
    <!--card offre-->
  <div class="container first-container">
    <div class="row padding">

    
      <div class="col-sm-4">
        <div class="card">
          <div class="img-fa">
          <i class="fas fa-id-card"></i>
          </div>
          <hr>
          <div class="card-body">
            <a href="editProfil.php" class="btn btn-secondary">Mon profil</a>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="card">
          <div class="img-fa">
          <i class="fas fa-newspaper"></i>
          </div>
          <hr>
            <div class="card-body">
              <a href="#" class="btn btn-secondary">Déposer un article</a>
            </div>
          </div>
        </div>

      <div class="col-sm-4">
        <div class="card">
          <div class="img-fa">
          <i class="fas fa-edit"></i>
          </div>
          <hr>
            <div class="card-body">
              <a href="myAdd.php" class="btn btn-secondary">Mes offres et demandes</a>
            </div>
          </div>
        </div>

    </div>
  </div>

  </div>
  </div>

  <br>
  <br>

  <div class="container-fluid padding">
  <div class="row text-center padding">
    
    <!--card offre-->
  <div class="container">
    <div class="row padding">
    

        <?php

        if(isset($_SESSION["IdPersonne"]) AND $_SESSION["IdPersonne"] > 0 AND $_SESSION["IdType"] == "A"){

        ?>

        <div class="col-sm-4">
        <div class="card">
          <div class="img-fa">
          <i class="fas fa-user-secret"></i>
          </div>
          <hr>
            <div class="card-body">
              <a href="admin.php" class="btn btn-success">ADMINISTRATION</a>
            </div>
          </div>
        </div>
        <?php
        }?>

        <div class="col-sm-4">
        <div class="card">
          <div class="img-fa">
          <i class="fas fa-sign-out-alt"></i>
          </div>
          <hr>
            <div class="card-body">
              <a href="../connexion/deconnexion.php" class="btn btn-danger" >Me déconnecter</a>
            </div>
          </div>
        </div>

    </div>
  </div>
  
</div>
</div>

<br>
<br>
<br>

    
  <!---Bas de page-->

<footer>
<div class="container-fluid padding">
<div class="row text-center">


  <div class="col-md-4">
    <img src="../img/logo.png">
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
    <img src="../img/focus_home_interactive_logo.svg" class="partenaire_logo" alt="partenaire">
    <img src="../img/novatim_logo.png" class="partenaire_logo" alt="article">
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