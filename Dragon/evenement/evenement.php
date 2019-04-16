<?php
	include ("../controleur/controleur.php");
?>

<html>
	<head>
	<title> Les evenements - Dragon's Eyes </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../css/evenement_style.css" rel="stylesheet">
	</head>
	<body>

		<!--nav class = "navbar navbar-expand-md navbar-light bg-light sticky-top">
	    <div class="container-fluid">
	      <a class="navbar-brand" href="#"><img src ="../img/logo.png"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse"data-target="#navbarResponsive">
	        <span class="navbar-toggler-icon"></span>
	      </button>
	      <div class="collapse navbar-collapse" id="navbarResponsive">
	        <ul class="navbar-nav">
	          <li class="nav-item">
	            <a class="nav-link" href="#">Déposer une annonce</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="offres/offres.html">Offres</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">Demandes</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="evenement/evenement.php">Evènement</a>
	          </li>
	        </ul>
	        <ul class="navbar-nav navbar-right ml-auto">
	          <li class="nav-item">
							<a href="../connexion/inscription.php" class="btn btn-primary">S'inscrire/Se connecter</a>
						</li>
					</ul>
				</div>
				</div>          
	</nav-->
                
                          <?php 
        $deposerAnnonce = null;
        include("includes/menu.php");
        ?>

	<header>
		<div class="container-fluid padding">
		<div class="row text-center">
		  <div class="col-xl-12">

			</div>
		</div>
		</div>

	</header>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
		<center> 
		<?php

			$unC = new Controleur("localhost","bdd_jeu","root","");

			$unC->setTable("deye_evenement");
			

			$resultats = $unC->select_all();
			include ("../vue/vue_select_evenement.php");
		?>
		</center>

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
