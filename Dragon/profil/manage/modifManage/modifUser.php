<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu;charset=utf8', 'root', '');

//requete SQL : modifie le status de l'utilisateur, le nom, le prenom, et l'email de la table deye_personne

if(isset($_SESSION['IdPersonne']) AND $_SESSION['IdType'] == "A")
{
   $u = "U";
   $requser = $bdd->prepare('SELECT * FROM deye_personne WHERE IdPersonne = ? AND IdType = ?');
   $requser->execute(array($_GET['modifUser'],$u));
   $modifUser = $requser->fetch();

   if(isset($_POST['newId']) AND !empty($_POST['newId'])){
      
  
    $newId = htmlspecialchars($_POST['newId']);
    $updateId = $bdd->prepare("UPDATE deye_personne SET IdType = ? WHERE IdPersonne = ? AND IdType = ?");
    $updateId->execute(array($newId,$_GET['modifUser'],$u));
    
  }

   if(isset($_POST['newNom']) AND !empty($_POST['newNom']) AND $_POST['newNom'] != $modifUser['nom']){
      
      $newNom = htmlspecialchars($_POST['newNom']);
      $updateNom = $bdd->prepare("UPDATE deye_personne SET nom = ? WHERE IdPersonne = ? AND IdType = ?");
      $updateNom->execute(array($newNom,$_GET['modifUser'],$u));
      
   }

   if(isset($_POST['newPrenom']) AND !empty($_POST['newPrenom']) AND $_POST['newPrenom'] != $modifUser['prenom']){
      
  
      $newPrenom = htmlspecialchars($_POST['newPrenom']);
      $updatePrenom = $bdd->prepare("UPDATE deye_personne SET prenom = ? WHERE IdPersonne = ? AND IdType = ?");
      $updatePrenom->execute(array($newPrenom,$_GET['modifUser'],$u));
      
   }

   if(isset($_POST['newEmail']) AND !empty($_POST['newEmail']) AND $_POST['newEmail'] != $modifUser['email']){
      
      $newEmail = htmlspecialchars($_POST['newEmail']);
      $updateEmail = $bdd->prepare("UPDATE deye_personne SET mail = ? WHERE IdPersonne = ? AND IdType = ?");
      $updateEmail->execute(array($newEmail,$_GET['modifUser'],$u));
      

    }
      
   

?>
<html>
   <head>
   <meta charset="utf-8">
      <meta name="viewport" content="width=device, initial-scale=1">
      <title>Dragon Eye's - Editer un utilisateur</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
      <link href="../../../css/style.css" rel="stylesheet">
      <link href="../../../css/modifUser_style.css" rel="stylesheet">
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
            <a class="nav-link" href="../../../offres/offres.php">Offres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../../demandes/demandes.php">Demandes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../../evenement/evenement.php">Evènements</a>
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
              <a href="../../../profil/profil.php" class="btn btn-primary"><?= $user['nom']?>  <?=$user['prenom'];?></a>
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



  <!---Formulaire pour modifier un utilisateur-->

   <div class="container-fluid padding">
      <div class="row text-center padding">
         <div class="container center-div">
         <div class="row">
         <form method="POST" class="form-signup">
            <div class="form_modif_user">
            <h4 class="card-title text-center">Modifier l'utilisateur</h4>
              <div class="form-label-group">
                <label for="inputUserType">Status de l'utilisateur</label>
                <input type="text" id="newId" class="form-control" name="newId" value="<?php echo $modifUser['IdType'];?>" placeholder="Changer de nom">
              </div>
              <div class="form-label-group">
                <label for="inputNom">Nom de l'utilisateur</label>
                <input type="text" id="newNom" class="form-control" name="newNom" value="<?php echo $modifUser['nom'];?>" placeholder="Changer de nom">
              </div>
              <div class="form-label-group">
                <label for="inputPrenom">Prenom</label>
                <input type="text" id="newPrenom" class="form-control" name="newPrenom" value="<?php echo $modifUser['prenom'];?>" placeholder="Changer de prenom">
              </div>
              <div class="form-label-group">
                <label for="inputEmail">Email</label>
                <input type="mail" id="newEmail" class="form-control" name="newEmail" value="<?php echo $modifUser['email'];?>" placeholder="Changer de mail">
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