<?php
include('../../../include/header.php');
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

    $requser = $bdd->prepare("SELECT * FROM deye_evenement WHERE IdEvent = ?");
    $requser->execute(array($_GET['idModifEvent']));
    $event = $requser->fetch();
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
  <?php  //include('../../../include/header.php'); ?>
  <!--Formulaire pour modifier un Evènement-->
   <div class="container-fluid padding">
      <div class="row text-center padding">
         <div class="container center-div col-6 m-top-100">
         <div class="row">
         <form method="POST" class="form-signup col-10 m-auto">
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
