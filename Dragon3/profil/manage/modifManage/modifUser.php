<?php
include('../../../include/header.php');







//requete SQL : modifie le status de l'utilisateur, le nom, le prenom, et l'email de la table deye_personne

if(isset($_SESSION['IdPersonne']) AND $_SESSION['IdType'] == "A")
{
   /*$u = "U";
   $requser = $bdd->prepare('SELECT * FROM deye_personne WHERE IdPersonne = ? AND IdType = ?');
   $requser->execute(array($_GET['modifUser'],$u)); 
   $modifUser = $requser->fetch();*/
   $modifUser = $unC_user->select_aUser($_GET['modifUser']);

   if(isset($_POST['newId']) AND !empty($_POST['newId'])){

      
   
    $newId = htmlspecialchars($_POST['newId']);
    /*
    $updateId = $bdd->prepare("UPDATE deye_personne SET IdType = ? WHERE IdPersonne = ? AND IdType = ?");
    $updateId->execute(array($newId,$_GET['modifUser'],$u));
    */

    $updateId = $unC_user->updateUser($newId,'idType',$_GET['modifUser'],'edit');
    
    
  }

   if(isset($_POST['newNom']) AND !empty($_POST['newNom']) AND $_POST['newNom'] != $modifUser['Nom']){
      
      $newNom = htmlspecialchars($_POST['newNom']);
      /*
      $updateNom = $bdd->prepare("UPDATE deye_personne SET nom = ? WHERE IdPersonne = ? AND IdType = ?");
      $updateNom->execute(array($newNom,$_GET['modifUser'],$u));
      */
      $updateNom = $unC_user->updateUser($newNom,'Nom',$_GET['modifUser'],'edit');
      
   }

   if(isset($_POST['newPrenom']) AND !empty($_POST['newPrenom']) AND $_POST['newPrenom'] != $modifUser['Prenom']){


      
      
      $newPrenom = htmlspecialchars($_POST['newPrenom']);
      /*
      $updatePrenom = $bdd->prepare("UPDATE deye_personne SET prenom = ? WHERE IdPersonne = ? AND IdType = ?");
      $updatePrenom->execute(array($newPrenom,$_GET['modifUser'],$u));
      */

      $updatePrenom = $unC_user->updateUser($newPrenom,'Prenom',$_GET['modifUser'],'edit');
      
   }

   if(isset($_POST['newEmail']) AND !empty($_POST['newEmail']) AND $_POST['newEmail'] != $modifUser['Email']){


      
      $newEmail = htmlspecialchars($_POST['newEmail']);
      /*
      $updateEmail = $bdd->prepare("UPDATE deye_personne SET mail = ? WHERE IdPersonne = ? AND IdType = ?");
      $updateEmail->execute(array($newEmail,$_GET['modifUser'],$u));
      */
      $updateEmail = $unC_user->updateUser($newEmail,'Email',$_GET['modifUser'],'edit');
    }
   
      
   /*$requser = $bdd->prepare('SELECT * FROM deye_personne WHERE IdPersonne = ? AND IdType = ?');
   $requser->execute(array($_GET['modifUser'],$u));
   $modifUser = $requser->fetch();*/
   $modifUser = $unC_user->select_aUser($_GET['modifUser']);


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
  <!---Formulaire pour modifier un utilisateur-->

   <div class="container-fluid padding">
      <div class="row text-center padding">
         <div class="container center-div col-6">
         <div class="row">
         <form method="POST" class="form-signup col-10 m-auto">
            <div class="form_modif_user">
            <h4 class="card-title text-center">Modifier l'utilisateur</h4>
              <div class="form-label-group">
                <label for="inputUserType">Status de l'utilisateur</label>
                <input type="text" id="newId" class="form-control" name="newId" value="<?php echo $modifUser['idType'];?>" placeholder="Changer de nom">
              </div>
              <div class="form-label-group">
                <label for="inputNom">Nom de l'utilisateur</label>
                <input type="text" id="newNom" class="form-control" name="newNom" value="<?php echo $modifUser['Nom'];?>" placeholder="Changer de nom">
              </div>
              <div class="form-label-group">
                <label for="inputPrenom">Prenom</label>
                <input type="text" id="newPrenom" class="form-control" name="newPrenom" value="<?php echo $modifUser['Prenom'];?>" placeholder="Changer de prenom">
              </div>
              <div class="form-label-group">
                <label for="inputEmail">Email</label>
                <input type="mail" id="newEmail" class="form-control" name="newEmail" value="<?php echo $modifUser['Email'];?>" placeholder="Changer de mail">
              </div>

              <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit">Je modifie</button>

              </div>

         </form>
      </div>
      </div>
    </div>
   </div>
  <?php include('../../../include/footer.php') ?>
</body>
</html>
<?php   
}
else{
   header("Location: ../../../connexion/inscription.php");
}
?>