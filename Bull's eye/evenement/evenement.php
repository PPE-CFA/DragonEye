<?php
	include ("../controleur/controleur.php");
?>

<html>
	<head>
	<title> Les Evenements - Dragon's Eyes </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../css/evenement_style.css" rel="stylesheet">
	</head>
	<body>

		<nav class = "navbar navbar-expand-md navbar-light bg-light sticky-top">
	    <div class="container-fluid">
	      <a class="navbar-brand" href="../index.php"><img src ="../img/logo.png"></a>
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
						<li class="nav-item">
							<a class="nav-link" href="../annonces/Annonce.php">Annonce</a>
						</li>
	        </ul>
	        <ul class="navbar-nav navbar-right ml-auto">
	          <li class="nav-item">
	            <!--button onclick="document.getElementById('id01').style.display='block'">Login</button>-->
	            <button onclick="document.getElementById('id01').style.display='block', show('eyeInscription')" class="btn btn-primary">S'inscrire/Se connecter</button>

	            <!-- The Modal -->
	            <div id="id01" class="modal">

	              <!-- Modal Content -->
	              <form action="/action_page.php">
	              <div class="container">
	                <div class="row">
	                  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
	                    <div class="card card-signin my-5">
	                      <div class="card-body">
	                        <div class"img-container">
	                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
	                        <img src="img/logo.png" class="logo_modal">
	                        </div>
	                        <div class="col-xs-12 d-flex flex-row">
	                          <button id="eyeConnexion" class="btn btn-lg btn-primary btn-block col-xs-6 col-md-6" onclick="show(id)" >Se connecter</button>
	                          <button id="eyeInscription" class="btn btn-lg btn-primary btn-block col-xs-6 col-md-6 mt-0" onclick="show(id)" >S'inscrire</button>
	                        </div>

	                        <!-- formulaire de connexion -->
	                        <form class="form-signin">
	                          <div id="eyeFormConnexion">
	                            <h5 class="card-title text-center">Se connecter</h5>
	                            <div class="form-label-group">
	                              <label for="inputEmail">Email</label>
	                              <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
	                            </div>
	                            <div class="form-label-group">
	                              <label for="inputPassword">Mot de passe</label>
	                              <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
	                            </div>
	                            <div class="custom-control custom-checkbox mb-3">
	                              <input type="checkbox" class="custom-control-input" id="customCheck1">
	                              <label class="custom-control-label" for="customCheck1">Me retenir</label>
	                            </div>
	                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Go !</button>

	                          </div>


	                        <!-- formulaire d'inscription -->

	                          <div id="eyeFormInscription">
	                            <h5 class="card-title text-center">S'inscrire</h5>
	                            <div class="form-label-group">
	                              <label for="inputEmail">Email</label>
	                              <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
	                            </div>
	                            <div class="form-label-group">
	                              <label for="inputEmail">Mot de passe</label>
	                              <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
	                            </div>
	                            <div class="form-label-group">
	                              <label for="inputEmail">Confirmer mot de passe</label>
	                              <input type="password" id="inputPassword" class="form-control" placeholder="Confirmer mot de passe" required>
	                            </div>
	                            <div class="custom-control custom-checkbox mb-3">
	                              <input type="checkbox" class="custom-control-input" id="customCheck1">
	                              <label class="custom-control-label" for="customCheck1">Me retenir</label>
	                            </div>
	                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Go !</button>
	                          </div>

	                        </form>

	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	            </form>
	            <script>
	            // Get the modal
	            var modal = document.getElementById('id01');

	            // When the user clicks anywhere outside of the modal, close it
	            window.onclick = function(event) {
	               if (event.target == modal) {
	                   modal.style.display = "none";
	               }
	            }

	            function show(id){
	              console.log(id);
	              if(id == "eyeInscription"){
	                document.getElementById("eyeFormConnexion").style.display = "none";
	                display = document.getElementById("eyeFormInscription").style.display = "block";
	                console.log(display);
	              }else if(id == "eyeConnexion"){
	                console.log("hello");
	                document.getElementById("eyeFormConnexion").style.display = "block";
	                document.getElementById("eyeFormInscription").style.display = "none";
	              }

	            }
	            </script>
	          </li>
	        </ul>
	      </div>
	</nav>

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

			$unC = new Controleur("localhost","dragoneye","root","");

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
