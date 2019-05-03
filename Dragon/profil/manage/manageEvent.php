<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Dragon's Eye - Edit Evenement</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/manageEvent_style.css" rel="stylesheet">
</head>

<body>
  <?php
    include('../../include/header.php');
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu;charset=utf8', 'root', '');

      //requete SQL : modifie ou supprime un jeu de la table deye_jeu
      if(isset($_SESSION['IdType']) AND $_SESSION['IdType'] == "A"){


          if(isset($_POST['formaddevent'])) {

            $nom = htmlspecialchars($_POST['newNameEvent']);
            $date = htmlspecialchars($_POST['newDateEvent']);
            $time = htmlspecialchars($_POST['newTimeEvent']);
            $adresse = htmlspecialchars($_POST['newAdresseEvent']);
            $photo = $_POST['newPhotoEvent'];

            if(!empty($nom) AND !empty($date) AND !empty($time) AND !empty($photo) AND !empty($adresse))
            {

                  $reqNom = $bdd->prepare("SELECT * FROM deye_evenement WHERE designation = ?");
                  $reqNom->execute(array($nom));
                  $nomExist = $reqNom->rowCount();
                  if($nomExist == 0){
                      $insertEvent = $bdd->prepare("INSERT INTO deye_evenement(designation,date_event,heure_event,IdPhoto,IdLieu) VALUES(?,?,?,?,?)");
                      $insertEvent->execute(array($nom,$date,$time,$photo,$adresse));
                      $erreur = "Votre évènement a bien été ajouté !";
                  }else{
                    $erreur2 = "L'évènement existe déja !";
                  }
              }else{
                $erreur2 = "Veuillez remplir tous les champs !";
            }

          }



          if(isset($_GET['type']) AND $_GET['type'] == 'allevents') {


            if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {

            $supprime = (int) $_GET['supprime'];
            $req = $bdd->prepare('DELETE FROM deye_evenement WHERE IdEvent = ?');
            $req->execute(array($supprime));


          }
      }

    }else{

      exit();
    }


    $allEvents = $bdd->query('SELECT IdEvent, designation, date_event, heure_event, url_photo, Adresse
    FROM deye_evenement
    INNER JOIN deye_photo ON deye_evenement.IdPhoto = deye_photo.IdPhoto
    INNER JOIN deye_lieu ON deye_evenement.IdLieu = deye_lieu.IdLieu ORDER BY IdEvent  DESC');


  ?>


  <div class="container-fluid padding">
  <div class="row text-center padding">



    <div class="container allEvents">
    <div class="row">

    <table class="table">
    <h2>Tous les Evènements </h2>
    <thead>
    <th>Id</th>
    <th>Photo</th>
    <th>Nom de l'évènement</th>
    <th>Date</th>
    <th>Heure</th>
    <th>Adresse</th>
    </thead>
    <tbody>
      <?php while($res = $allEvents->fetch()){?>
      <tr class="table-info">

            <td>
                <?=$res['IdEvent']?>
            </td>

            <td>
                <img src="<?=$res['url_photo']?>"/>
            </td>

            <td>
                <?=$res['designation']?>
            </td>

            <td>
                <?=$res['date_event']?>
            </td>

            <td>
                <?=$res['heure_event']?>
            </td>

            <td>
                <?=$res['Adresse']?>
            </td>

            <td>
                <a href="modifManage/modifEvent.php?type=modifevent&idModifEvent<?= $res['IdEvent'] ?>" class="btn btn-primary">Modifier</a>
                <a href="manageEvent.php?type=allevents&supprime=<?= $res['IdEvent'] ?>" class="btn btn-danger">Supprimer</a>
            </td>



      </tr>
        <?php
        }
        ?>
      </tbody>

    </table>

    </div>
    </div>

    <!--Formulaire pour ajouter un Evenement-->
    <div class = "container ajoutEvent">
    <div class = "row">


    <form method="POST" class="form-inline">
    <h2 class="card-title add_event_title">Ajouter un Evènement</h2>
      <div class="form_add_event">
        <div class="form-label-group">
          <label for="inputPhotoEvent">Photo de l'évènement</label>
          <input type="text" id="newPhotoEvent" class="form-control" name="newPhotoEvent" placeholder="Insérer une photo de l'évènement">
        </div>
        <div class="form-label-group">
          <label for="inputDateEvent">Nom de l'évènement</label>
          <input type="text" id="newNameEvent" class="form-control" name="newNameEvent" placeholder="">
        </div>
        <div class="form-label-group">
          <label for="inputDateEvent">Date de l'évènement</label>
          <input type="date" id="newDateEvent" class="form-control" name="newDateEvent" placeholder="">
        </div>
        <div class="form-label-group">
          <label for="inputTimeEvent">Heure de l'évènement</label>
          <input type="text" id="newTimeEvent" class="form-control" name="newTimeEvent" placeholder="Ex : 15:00:00">
        </div>
        <div class="form-label-group">
          <label for="inputAdresseEvent">Adresse</label>
          <input type="text" id="newAdresseEvent" class="form-control" name="newAdresseEvent" placeholder="">
        </div>
        <button class="btn btn-md btn-success" name="formaddevent" type="submit">Valider</button>

      </div>
    </form>

    <?php
      if(isset($erreur2)) {
              echo '<font color="red" class="erreur">'.$erreur2."</font>";
      }
      if(isset($erreur)){
        echo '<font color="green" class="erreur">'.$erreur."</font>";
      }
    ?>

    </div>
    </div>


    <div class="container button-end">
    <a href="../../profil/admin.php" class="btn btn-secondary">Revenir en arrière</a>
    <a href="../../connexion/deconnexion.php" class="btn btn-danger">Me déconnecter</a>
    </div>



  </div>
  </div>
  <!-- Je veux un tableau qui affiche tous les events et que tu puisses les supprimer et les modifier
  et un formulaire qui permet d'ajouter un event.
  Puis je veux deux boutons, le premier btn btn-secondary "revenir en arrière" qui permet de revenir à admin.php et l'autre
  qui permet de se déconnecter "me déconnecter" btn btn-danger.
  Si le footer est en haut à l'affichage c'est normal il faut du contenu entre la nav barre et le bas de page !
  Les feuilles de CSS manageEvent_style.css et modifEvent_style.css sont à ta disposition pour le CSS de la page.
  INTERDICTION DE TOUCHER AU RESTE DES PAGES SANS ME LE DIRE.
  Me signaler dès que tu vois un bug.
  -->
  <?php include('../../include/footer.php') ?>    
</body>
</html>
