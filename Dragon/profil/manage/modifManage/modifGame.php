
<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu', 'root', '');

//requete SQL = modifier le nom, la date, le prix, le temps de jeu et le nombre de joueurs de la table deye_jeux

if(isset($_SESSION['IdPersonne']) AND $_SESSION['IdType'] == "A")
{
   $requser = $bdd->prepare("SELECT * FROM deye_jeux WHERE IdJeux = ?");
   $requser->execute(array($_GET['idModifGame']));
   $game = $requser->fetch();

   if(isset($_POST['newNom']) AND !empty($_POST['newNom']) AND $_POST['newNom'] != $game['designation']){
      
      $newNom = htmlspecialchars($_POST['newNom']);
      $updateNom = $bdd->prepare("UPDATE deye_jeux SET designation = ? WHERE IdJeux = ?");
      $updateNom->execute(array($newNom,$_GET['idModifGame']));
      
   }

   if(isset($_POST['newDate']) AND !empty($_POST['newDate']) AND $_POST['newDate'] != $game['date_sortie']){
      
      $newDate = htmlspecialchars($_POST['newDate']);
      $updateDate = $bdd->prepare("UPDATE deye_jeux SET date_sortie = ? WHERE IdJeux = ?");
      $updateDate->execute(array($newDate,$_GET['idModifGame']));
      
   }

   if(isset($_POST['newPrix']) AND !empty($_POST['newPrix']) AND $_POST['newPrix'] != $game['prix']){
      
      $newPrix = htmlspecialchars($_POST['newPrix']);
      $updatePrix = $bdd->prepare("UPDATE deye_jeux SET prix = ? WHERE IdJeux = ?");
      $updatePrix->execute(array($newPrix,$_GET['idModifGame']));
      
   }

   if(isset($_POST['newTimeGame']) AND !empty($_POST['newTimeGame']) AND $_POST['newTimeGame'] != $game['temps_jeux']) {
      
      $newTime = htmlspecialchars($_POST['newTimeGame']);
      $updateTime = $bdd->prepare("UPDATE deye_jeux SET temps_jeux = ? WHERE IdJeux = ?");
      $updateTime->execute(array($newTime,$_GET['idModifGame']));

   }

    if(isset($_POST['newNumberPlayers']) AND !empty($_POST['newNumberPlayers']) AND $_POST['newNumberPlayers'] != $game['nb_joueurs']){
      
      $newNumberPlayers = htmlspecialchars($_POST['newNumberPlayers']);
      $updateNumberPlayers = $bdd->prepare("UPDATE deye_jeux SET nb_joueurs = ? WHERE IdJeux = ?");
      $updateNumberPlayers->execute(array($newNumberPlayers,$_GET['idModifGame']));
        
    
      
    }
      
   

?>
<html>
   <head>
   <meta charset="utf-8">
      <meta name="viewport" content="width=device, initial-scale=1">
      <title>Dragon Eye's - Editer</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
      <link href="../../../css/style.css" rel="stylesheet">
      <link href="../../../css/modifGame_style.css" rel="stylesheet">
   </head>


<body>

   <!--- Navigation --->
  <nav class = "navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../../index.php"><img src ="../../../img/logo.png"></a>
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
            <a class="nav-link" href="../../evenement/evenement.php">Evènements</a>
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
              <a href="../../../profil/profil.php" class="btn btn-primary"><?= $user['nom'];?> <?=$user['prenom'];?></a>
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

   



    <!--Formulaire pour modifier un jeu-->
   <div class="container-fluid padding">
      <div class="row text-center padding">
         <div class="container center-div">
         <div class="row">
         <form method="POST" class="form-signup">
            <div class="form_modif_game">
            <h4 class="card-title text-center">Modifier le jeu</h4>
              <div class="form-label-group">
                <label for="inputGame">Nom du Jeu</label>
                <input type="text" id="newNom" class="form-control" name="newNom" value="<?php echo $game['designation'];?>" placeholder="Changer de nom">
              </div>
              <div class="form-label-group">
                <label for="inputDate">Date de sortie</label>
                <input type="date" id="newDate" class="form-control" name="newDate" value="<?php echo $game['date_sortie'];?>" placeholder="Changer de date">
              </div>
              <div class="form-label-group">
                <label for="inputPrix">Prix</label>
                <input type="text" id="newPrix" class="form-control" name="newPrix" value="<?php echo $game['prix'];?>" placeholder="Changer prix">
              </div>
              <div class="form-label-group">
                <label for="inputTimeGame">Temps de jeu</label>
                <input type="time" id="newTimeGame" class="form-control" name="newTimeGame" value="<?php echo $game['temps_jeux'];?>" placeholder="Changer le temps de jeu">
              </div>
              <div class="form-label-group">
                <label for="inputNumberPlayers">Nombre de joueurs</label>
                <input type="text" id="newNumberPlayers" class="form-control" name="newNumberPlayers" value="<?php echo $game['nb_joueurs'];?>" placeholder="Changer le nombre de joueurs">
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