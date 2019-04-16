
<?php
session_start();

//requete SQL : modifie le nom, le prenom, le mail, et le mdp de l'utilisateur de la table deye_personne

$bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu;charset=utf8', 'root', '');

if(isset($_SESSION['IdPersonne']))
{
   $requser = $bdd->prepare("SELECT * FROM deye_personne WHERE IdPersonne = ?");
   $requser->execute(array($_SESSION['IdPersonne']));
   $user = $requser->fetch();

   if(isset($_POST['newNom']) AND !empty($_POST['newNom']) AND $_POST['newNom'] != $user['nom']){
      
      $newNom = htmlspecialchars($_POST['newNom']);
      $u = "U";
      $updateNom = $bdd->prepare("UPDATE deye_personne SET nom = ? WHERE IdPersonne = ? AND IdType = ?");
      $updateNom->execute(array($newNom,$_SESSION['IdPersonne'],$u));
      
   }

   if(isset($_POST['newPrenom']) AND !empty($_POST['newPrenom']) AND $_POST['newPrenom'] != $user['prenom']){
      
      $newPrenom = htmlspecialchars($_POST['newPrenom']);
      $u = "U";
      $updatePrenom = $bdd->prepare("UPDATE deye_personne SET prenom = ? WHERE IdPersonne = ? AND IdType = ?");
      $updatePrenom->execute(array($newPrenom,$_SESSION['IdPersonne'],$u));
      
   }

   if(isset($_POST['newMail']) AND !empty($_POST['newMail']) AND $_POST['newMail'] != $user['email']){
      
      $newMail = htmlspecialchars($_POST['newMail']);
      $u = "U";
      $updateMail = $bdd->prepare("UPDATE deye_personne SET email = ? WHERE IdPersonne = ? AND IdType = ?");
      $updateMail->execute(array($newMail,$_SESSION['IdPersonne'],$u));
      
   }

   if(isset($_POST['newMdp']) AND !empty($_POST['newMdp']) AND isset($_POST['newMdp2']) AND !empty($_POST['newMdp2'])) {
      
      $newMdp = ($_POST['newMdp']);
      $newMdp2 = ($_POST['newMdp2']);
      $u = "U";
      if($newMdp == $newMdp2){
         $updateMdp = $bdd->prepare("UPDATE deye_personne SET mdp = ? WHERE IdPersonne = ? AND IdType = ?");
         $updateMdp->execute(array($newMdp,$_SESSION['IdPersonne'],$u));
      }else{
         $erreur = "Vos deux mots de passe ne correspondent pas !";
      }
      
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
      <link href="../css/style.css" rel="stylesheet">
      <link href="../css/editProfil_style.css" rel="stylesheet">
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
              <a href="profil.php" class="btn btn-primary"><?= $user['nom'];?> <?=$user['prenom'];?></a>
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



  <!-- Formulaire de modification d'un utilisateur-->
   <div class="container-fluid padding">
   <div class="row text-center padding">

         <div class="container center_div">
          <div class="row">
         <form method="POST" class="form-signup">
            <div class="sign_up">
            <h4 class="card-title text-center">Modifier mon profil</h4>
              <div class="form-label-group">
                <label for="inputInscription">Nom</label>
                <input type="text" id="newNom" class="form-control" name="newNom" value="<?php echo $user['nom'];?>" placeholder="Entrer votre nom">
              </div>
              <div class="form-label-group">
                <label for="inputPrenom">Prenom</label>
                <input type="text" id="newPrenom" class="form-control" name="newPrenom" value="<?php echo $user['prenom'];?>" placeholder="Entrer votre prenom">
              </div>
              <div class="form-label-group">
                <label for="inputEmail">Email</label>
                <input type="email" id="newMail" class="form-control" name="newMail" value="<?php echo $user['email'];?>" placeholder="Email">
              </div>
              <div class="form-label-group">
                <label for="inputMdp">Mot de passe</label>
                <input type="password" id="newMdp" class="form-control" name="newMdp" value="<?php echo $user['mdp'];?>" placeholder="Mot de passe">
              </div>
              <div class="form-label-group">
                <label for="inputMdp2">Confirmer mot de passe</label>
                <input type="password" id="newMdp2" class="form-control" name="newMdp2" placeholder="Confirmer mot de passe">
              </div>

              <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit">Je modifie</button>
              </div>
         </form>
         <?php 
            if (isset($erreur)){

               echo $erreur;
            }
    
         ?>
      </div>
      </div>

  </div>
  </div>



  <br>

  <br>
  <br>
  <br>
  <br>



<!--Bas de page -->
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
<?php   
}
else{
   header("Location: inscription.php");
}
?>