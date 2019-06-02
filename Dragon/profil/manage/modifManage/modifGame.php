
<?php
 include('../../../include/header.php');
 //page specific controller
 include(_DIR2_.'/controleur/controleurJeu.php');
 $unC_jeu = new ControleurJeu($host, $bdd_nom, $bdd_user, $mdp);
//requete SQL = modifier le nom, la date, le prix, le temps de jeu et le nombre de joueurs de la table deye_jeux

if(isset($_SESSION['IdPersonne']) AND $_SESSION['IdType'] == "A")
{
   /*$requser = $bdd->prepare('SELECT IdJeux, designation, date_sortie, prix, temps_jeux, nb_joueurs, deye_editeur.Nom, deye_age.age_requis
                              FROM deye_jeux
                              INNER JOIN deye_editeur  ON deye_jeux.IdEditeur = deye_editeur.IdEditeur
                              INNER JOIN deye_age      ON deye_jeux.IdAge = deye_age.IdAge
                             ');

   $requser->execute(array($_GET['idModifGame']));
   $game = $requser->fetch();*/

   $game = $unC_jeu->select_Jeu($_GET['idModifGame']);

   if(isset($_POST['newNom']) AND !empty($_POST['newNom']) AND $_POST['newNom'] != $game['designation']){
      
      //$updateNom = $bdd->prepare("UPDATE deye_jeux SET designation = ? WHERE IdJeux = ?");
      //$updateNom->execute(array($newNom,$_GET['idModifGame']));

      $newNom = htmlspecialchars($_POST['newNom']);
      $unC_jeu->updateJeu($newNom, 'Designation', $_GET['idModifGame'], 'edit');
   }

   if(isset($_POST['newDate']) AND !empty($_POST['newDate']) AND $_POST['newDate'] != $game['date_sortie']){
      $newDate = htmlspecialchars($_POST['newDate']);
      $unC_jeu->updateJeu($newDate, 'Date_sortie', $_GET['idModifGame'], 'edit');
   }

   if(isset($_POST['newPrix']) AND !empty($_POST['newPrix']) AND $_POST['newPrix'] != $game['prix']){
      $newPrix = htmlspecialchars($_POST['newPrix']);
      $unC_jeu->updateJeu($newPrix, 'Prix', $_GET['idModifGame'], 'edit');
   }

   if(isset($_POST['newTimeGame']) AND !empty($_POST['newTimeGame']) AND $_POST['newTimeGame'] != $game['temps_jeux']) {
      $newTime = htmlspecialchars($_POST['newTimeGame']);
      $unC_jeu->updateJeu($newTime, 'Temps_jeux', $_GET['idModifGame'], 'edit');
   }

    if(isset($_POST['newNumberPlayers']) AND !empty($_POST['newNumberPlayers']) AND $_POST['newNumberPlayers'] != $game['nb_joueurs']){
      $newNumberPlayers = htmlspecialchars($_POST['newNumberPlayers']);
      $unC_jeu->updateJeu($newNumberPlayers, 'Nb_joueurs', $_GET['idModifGame'], 'edit');
    }

    if(isset($_POST['newIdEditeur']) AND !empty($_POST['newIdEditeur']) AND $_POST['newIdEditeur'] != $game['Nom']){
      $newIdEditeur = htmlspecialchars($_POST['newIdEditeur']);
      //$updateIdEditeur = $bdd->prepare("UPDATE deye_jeux SET IdEditeur = ? WHERE IdJeux = ?");
      //$updateIdEditeur->execute(array($newIdEditeur,$_GET['idModifGame']));

      $unC_jeu->updateJeu($newIdEditeur, 'idEditeur', $_GET['idModifGame'], 'edit');
    }


    if(isset($_POST['newIdAge']) AND !empty($_POST['newIdAge']) AND $_POST['newIdAge'] != $game['age_requis']){
      $newIdAge = htmlspecialchars($_POST['newIdAge']);
      //$updateIdAge = $bdd->prepare("UPDATE deye_jeux SET IdAge = ? WHERE IdJeux = ?");
      //$updateIdAge->execute(array($newIdAge,$_GET['idModifGame']));

      $unC_jeu->updateJeu($newIdAge, 'idAge', $_GET['idModifGame'], 'edit');
    }

    $game = $unC_jeu->select_Jeu($_GET['idModifGame']);
?>
<html>
   <head>
   <meta charset="utf-8">
      <meta name="viewport" content="width=device, initial-scale=1">
      <title>Dragon Eye's - Editer un jeu</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
      <link href="../../../css/style.css" rel="stylesheet">
      <link href="../../../css/modifGame_style.css" rel="stylesheet">
   </head>


<body>
  <!--Formulaire pour modifier un jeu-->
   <div class="container-fluid padding m-top-100">
      <div class="row text-center padding">
         <div class="container center-div col-6 m-auto">
         <div class="row">
         <form method="POST" class="form-signup col-10">
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
              <div class="form-label-group">
                <label for="inputIdEditeur">Editeur</label>
                <input type="text" id="newIdEditeur" class="form-control" name="newIdEditeur" value="<?php echo $game['Nom'];?>" placeholder="Changer le nom de l'éditeur">
              </div>
              <div class="form-label-group">
                <label for="inputIdAge">Nombre de joueurs</label>
                <input type="text" id="newIdAge" class="form-control" name="newIdAge" value="<?php echo $game['age_requis'];?>" placeholder="Changer le nombre de joueurs">
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