<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu', 'root', '');

//requete SQL = modifier le nom, la date, le prix, le temps de jeu et le nombre de joueurs de la table deye_jeux

if(isset($_SESSION['IdPersonne']) AND $_SESSION['IdType'] == "A")
{
   $requser = $bdd->prepare("SELECT * FROM deye_evenement WHERE IdEvent = ?");
   $requser->execute(array($_GET['idModifEvent']));
   $event = $requser->fetch();

   if(isset($_POST['newNom']) AND !empty($_POST['newNom']) AND $_POST['newNom'] != $event['designation']){

      $newNom = htmlspecialchars($_POST['newNom']);
      $updateNom = $bdd->prepare("UPDATE deye_evenement SET designation = ? WHERE IdEvent = ?");
      $updateNom->execute(array($newNom,$_GET['idModifEvent']));

   }

   if(isset($_POST['newDateEvent']) AND !empty($_POST['newDateEvent']) AND $_POST['newDateEvent'] != $event['date_event']){

      $newDateEvent = htmlspecialchars($_POST['newDateEvent']);
      $updateDate = $bdd->prepare("UPDATE deye_evenement SET date_event = ? WHERE IdEvent = ?");
      $updateDate->execute(array($newDateEvent,$_GET['idModifEvent']));

   }

   if(isset($_POST['newTimeEvent']) AND !empty($_POST['newTimeEvent']) AND $_POST['newTimeEvent'] != $event['heure_event']){

      $newTimeEvent = htmlspecialchars($_POST['newTimeEvent']);
      $updateTime = $bdd->prepare("UPDATE deye_evenement SET heure_event = ? WHERE IdEvent = ?");
      $updateTime->execute(array($newTimeEvent,$_GET['idModifEvent']));

   }

   if(isset($_POST['newPhotoEvent']) AND !empty($_POST['newPhotoEvent']) AND $_POST['newPhotoEvent'] != $event['IdPhoto']) {

      $newPhotoEvent = htmlspecialchars($_POST['newPhotoEvent']);
      $updatePhoto = $bdd->prepare("UPDATE deye_evenement SET IdPhoto = ? WHERE IdPhoto = ?");
      $updatePhoto->execute(array($newPhotoEvent,$_GET['idModifEvent']));

   }

    if(isset($_POST['newAdresseEvent']) AND !empty($_POST['newAdresseEvent']) AND $_POST['newAdresseEvent'] != $event['IdLieu']){

      $newAdresseEvent = htmlspecialchars($_POST['newAdresseEvent']);
      $updateAdresse = $bdd->prepare("UPDATE deye_evenement SET IdLieu = ? WHERE IdLieu = ?");
      $updateAdresse->execute(array($newAdresseEvent,$_GET['idModifEvent']));

    }

?>


<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Dragon's Eye - Editer</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../../../css/style.css" rel="stylesheet">
  <link href="../../../css/modifEvent_style.css" rel="stylesheet">
</head>
<body>

<!--- Navigation 
  <nav class = "navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../../index.php"><img src ="../../../img/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
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

              $bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu', 'root', '');

              if(isset($_SESSION["IdPersonne"]) AND $_SESSION["IdPersonne"] > 0){
                $requser = $bdd->prepare("SELECT * FROM deye_personne WHERE IdPersonne = ?");
                $requser->execute(array($_SESSION['IdPersonne']));
                $user = $requser->fetch();
            ?>
              <a href="../../../profil/profil.php" class="btn btn-primary"><?= $user['nom'], $user['prenom'];?></a>
            <?php
              }else{
            ?>
                <a href="../../../connexion/inscription.php" class="btn btn-primary">S'inscrire/Se connecter</a>
            <?php
            }
          ?>
		     </li>
			 </ul>
		 </div>
	 </div>
  </nav>
  --->


  <!--Formulaire pour modifier un Evènement-->
   <div class="container-fluid padding">
      <div class="row text-center padding">
         <div class="container center-div">
         <div class="row">
         <form method="POST" class="form-signup">
            <div class="form_modif_event">
            <h4 class="card-title text-center">Modifier l'évènement</h4>
              <div class="form-label-group">
                <label for="inputEvent">Nom de l'évènement</label>
                <input type="text" id="newNom" class="form-control" name="newNom" value="<?php echo $event['designation'];?>" placeholder="Changer de nom">
              </div>
              <div class="form-label-group">
                <label for="inputPhotoEvent">Photo de l'évènement</label>
                <input type="text" id="newPhotoEvent" class="form-control" name="newPhotoEvent" value="<?php echo $event['IdPhoto'];?>" placeholder="Changer la photo">
              <div class="form-label-group">
                <label for="inputDateEvent">Date de l'évènement</label>
                <input type="date" id="newDateEvent" class="form-control" name="newDateEvent" value="<?php echo $event['date_event'];?>" placeholder="Changer de date">
              </div>
              <div class="form-label-group">
                <label for="inputTimeEvent">Heure de l'évènement</label>
                <input type="text" id="newTimeEvent" class="form-control" name="newTimeEvent" value="<?php echo $event['heure_event'];?>" placeholder="Changer d'heure">
              </div>
              <div class="form-label-group">
                <label for="inputAdresseEvent">Adresse</label>
                <input type="text" id="newAdresseEvent" class="form-control" name="newAdresseEvent" value="<?php echo $event['IdLieu'];?>" placeholder="Changer l'adresse">
              </div>

              <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit">Je modifie</button>
              </div>
         </form>

      </div>
      </div>
    </div>
   </div>



<!--Bas de page-->
<footer>
<div class="container-fluid padding">
<div class="row text-center">


  <div class="col-md-4">
    <img src="../../../img/logo.png">
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
    <img src="../../../img/focus_home_interactive_logo.svg" class="partenaire_logo" alt="partenaire">
    <img src="../../../img/novatim_logo.png" class="partenaire_logo" alt="article">
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
<?php
}
else{
   header("Location: ../../../connexion/inscription.php");
}
?>
