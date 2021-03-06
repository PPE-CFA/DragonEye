
<?php
include('../include/header.php');

if(isset($_SESSION['IdPersonne']))
{
   //select_user
   //$requser = $bdd->prepare("SELECT * FROM deye_personne WHERE IdPersonne = ?");
   //$requser->execute(array($_SESSION['IdPersonne']));
   //$user = $requser->fetch();

   if(isset($_POST['newNom']) AND !empty($_POST['newNom']) AND $_POST['newNom'] != $user['Nom']){
      $newNom = htmlspecialchars($_POST['newNom']);
      $unC_user->updateUser($newNom, 'Nom', $_SESSION['IdPersonne'], 'edit');
   }

   if(isset($_POST['newPrenom']) AND !empty($_POST['newPrenom']) AND $_POST['newPrenom'] != $user['Prenom']){
      $newPrenom = htmlspecialchars($_POST['newPrenom']);
      $unC_user->updateUser($newPrenom, 'Prenom', $_SESSION['IdPersonne'], 'edit');
   }

   if(isset($_POST['newMail']) AND !empty($_POST['newMail']) AND $_POST['newMail'] != $user['Email']){
      $newMail = htmlspecialchars($_POST['newMail']);
      $unC_user->updateUser($newMail, 'Email', $_SESSION['IdPersonne'], 'edit');
   }

   if(isset($_POST['newMdp']) AND !empty($_POST['newMdp']) AND isset($_POST['newMdp2']) AND !empty($_POST['newMdp2'])) {
      $newMdp = ($_POST['newMdp']);
      $newMdp2 = ($_POST['newMdp2']);
      if($newMdp === $newMdp2){
         $unC_user->updateUser($newMdp, 'Mdp', $_SESSION['IdPersonne'], 'edit');
      }else{
         $erreur = "Vos deux mots de passe ne correspondent pas !";
      }
      
   }
   
   //$requser = $bdd->prepare("SELECT * FROM deye_personne WHERE IdPersonne = ?");
   //$requser->execute(array($_SESSION['IdPersonne']));
   //$user = $requser->fetch();

   //refresh info
   $user = $unC_user->select_User($_SESSION["IdPersonne"]);
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
  <!-- Formulaire de modification d'un utilisateur-->
   <div class="container-fluid padding">
   <div class="row text-center padding">

         <div class="center_div col-6 m-auto">
          <div class="row">
         <form method="POST" class="form-signup col-10 m-auto">
            <div class="sign_up">
            <h4 class="card-title text-center">Modifier mon profil</h4>
              <div class="form-label-group">
                <label for="inputInscription">Nom</label>
                <input type="text" id="newNom" class="form-control" name="newNom" value="<?php echo $user['Nom'];?>" placeholder="Entrer votre nom">
              </div>
              <div class="form-label-group">
                <label for="inputPrenom">Prenom</label>
                <input type="text" id="newPrenom" class="form-control" name="newPrenom" value="<?php echo $user['Prenom'];?>" placeholder="Entrer votre prenom">
              </div>
              <div class="form-label-group">
                <label for="inputEmail">Email</label>
                <input type="email" id="newMail" class="form-control" name="newMail" value="<?php echo $user['Email'];?>" placeholder="Email">
              </div>
              <div class="form-label-group">
                <label for="inputMdp">Mot de passe</label>
                <input type="password" id="newMdp" class="form-control" name="newMdp" value="<?php echo $user['Mdp'];?>" placeholder="Mot de passe">
              </div>
              <div class="form-label-group">
                <label for="inputMdp2">Confirmer mot de passe</label>
                <input type="password" id="newMdp2" class="form-control" name="newMdp2" placeholder="Confirmer mot de passe">
              </div>
              <?php 
                  if (isset($erreur)){
                     echo '<div class="alert alert-danger">'.$erreur.'</div>';
                  }
               ?>
              <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit">Je modifie</button>
              </div>
         </form>
      </div>
      </div>

  </div>
  </div>



  <br>

  <br>
  <br>
  <br>
  <br>
  <?php include('../include/footer.php') ?>
</body>
</html>
<?php   
}
else{
   header("Location: inscription.php");
}
?>