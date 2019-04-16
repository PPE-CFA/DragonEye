<?php
	include 'modele.php'; 
	include 'controleur.php';
	include 'bdd.php';
?>
DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device, initial-scale=1">
      <title>Bull's Eye</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
      <link href="../css/style.css" rel="stylesheet">
    </head>

      <body>
      <!--- Navigation --->
        <nav class = "navbar navbar-expand-md navbar-light bg-light sticky-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><img src ="../img/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarResponsive">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="annonce.html">Déposer une annonce</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="jeux.php">Jeux</a>
                </li>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
                </li>
              </ul>
              <ul class="navbar-nav navbar-right ml-auto">
                <li class="nav-item">
                  <button type="button" class="btn btn-primary">S'inscrire/Se connecter</button>
                  <!--<a class="nav-link" href="#">S'incrire/Se connecter</a>-->
                </li>
              </ul>
            </div>
        </nav>

        <!--filtre et card!-->
        <div class="container-fluid padding">
        <div class="row text-center padding">
          <div class="container col-12">


          <div class="container col-4">
          <div class="row padding">
            <h2>Filterable List</h2>
            <p>Type something in the input field to search the list for specific items:</p>
            <input class="form-control" id="inputGame" type="text" placeholder="Rechercher un jeu">
            <input class="form-control" id="inputPlace" type="text" placeholder="Rechercher un lieu">
            <button class="btn btn-xl btn-primary sorter" value="jeux video">Jeux video</button>
            <button class="btn btn-xl btn-primary sorter" value="jeux de société">Jeu de société</button>
            <button class="btn btn-xl btn-primary game">Jeux video</button>

          </div>
          </div>

            <!--card offre-->
	<?php
		select_all()
		while ($donnees = $sql->fetch())
		{
	?>
          <div class="container col-8">
            <div class="row padding">

                <p>
				<strong>Jeu</strong> : <?php echo $donnees['designation']; ?><br />
				<strong>date de sortie</strong> : <?php echo $donnees['date_sortie']; ?><br />
				<strong>prix sur le marché</strong> :<?php echo $donnees['prix']; ?> euros<br />
				<strong>Temps de jeu</strong> :<?php echo $donnees['temps_Jeux']; ?><br />
				<strong>Nombres de joueurs</strong> :<?php echo $donnees['nb_joueurs']; ?> au maximum<br />
				<strong>Categorie</strong> :<?php echo $donnees['IdCategorie']; ?><br />
				<strong>date de validation</strong> : <?php echo $donnees['date_validation']; ?><br />
				</p>
              </div>
			  
                <br>
                <a href="connect/sign.html"class="btn btn-primary">Voir plus</a>
                <hr>
             </div>
         </div>
        </div>
        </div>

	<?php
	}
	$reponse->closeCursor();
	?>

      <!---Footer!-->
      <br>
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
          <i <i class="fas fa-table"></i>
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

    <script>
	//afficher les jeux
	$(document).ready(function() {
		$resultats = $this->unModele->select_all();
			return $resultats;
	
			
    //rechercher un jeu
    $(document).ready(function(){
      $("#inputGame").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".card h4").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    //rechercher un lieu
    $(document).ready(function(){
      $("#inputPlace").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".card-text-place").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    //catégorie jeux video ou jeu de société
    $(document).ready(function(){
      $(".sorter").on("click", function() {
        var value = $(this).val().toLowerCase();
        console.log(value);
        $("p").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    $(document).ready(function(){
      $(".game").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".card-text-typeGame").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });



    </script>

</html>
