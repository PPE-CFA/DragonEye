<?php

	$bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu;charset=utf8', 'root', '');

	$allEvent = $bdd->query('SELECT designation, heure_event, date_event, deye_photo.url_photo, deye_lieu.Adresse, deye_lieu.ville, deye_lieu.Nom
													FROM deye_evenement
													INNER JOIN deye_photo ON deye_evenement.IdEvent=deye_photo.IdPhoto
													INNER JOIN deye_lieu ON deye_evenement.IdEvent=deye_lieu.IdLieu
													ORDER BY date_event ASC');

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Dragon's Eye - Les évènements</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/evenement_style.css" rel="stylesheet">
</head>

<body>
<!--- Navigation --->
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
            <a class="nav-link" href="../offres/offres.php">Offres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../demandes/demandes.php">Demandes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../evenement/evenement.php">Evènements</a>
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
              <a href="../profil/profil.php" class="btn btn-primary"><?= $user['nom']?> <?=$user['prenom'];?></a>
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

	<div class="container-fluid padding">
		<div class="row titleEvent text-center">
  	<div class="col-12">
    <br>
    	<h2>Retrouver ici tous les évènements dans les boutiques de jeux de société en France !</h2>
  	</div>
		</div>
</div>

	<div class="container-fluid padding">
	<div class="row padding">
			
		<div class="container allEvent">
		<div class="row">
			
		<table class="table">
            <thead>
                <th>Evènements</th>
                <th>Heure</th>
                <th>Date</th>
								<th>Boutique</th>
                <th>Adresse</th>
                <th></th>
                
                
            </thead>
                <tbody>
                <?php while($res = $allEvent->fetch()){?>
                <tr class="table-info">

                      
                <td>
                    <?=$res['designation']?>
                </td>

                <td>  
                    <?=$res['heure_event']?> 
                </td>

                <td>
                    <?=$res['date_event']?>
                </td>

                <td>
                    <?=$res['Nom']?>
                </td>

                <td>
									<?=$res['Adresse']?>, <?=$res['ville']?>
                </td>

                <td>
									<img src="<?=$res['url_photo']?>"/> 
                </td>


                </tr>
                <?php
                  }
                ?>
              </tbody>

        </table>



		</div>
		</div>
	</div>
	</div>





	

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
