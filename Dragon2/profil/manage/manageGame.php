<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Dragon Eye's - Edit les jeux</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/manageGame_style.css" rel="stylesheet">
</head>

<body>
  <?php
    include('../../include/header.php');

      //requete SQL : ajoute et supprime un jeu de la table deye_jeu
      if(isset($_SESSION['IdType']) AND $_SESSION['IdType'] == "A"){


          if(isset($_POST['formaddgame'])) {

            $nom = htmlspecialchars($_POST['newNameGame']);
            $date = htmlspecialchars($_POST['newDateGame']);
            $price = htmlspecialchars($_POST['newPriceGame']);
            $time = htmlspecialchars($_POST['newTimeGame']);
            $numbersPlayers = htmlspecialchars($_POST['newNumbersPlayersGame']);
            $idAdmin = $_SESSION['IdPersonne'];
            $idEditeur = htmlspecialchars($_POST['newIdEditeurGame']);
            $age = htmlspecialchars($_POST['newAgeGame']);
            $idCategorie = htmlspecialchars($_POST['newCategorieGame']);
            $idPhoto = htmlspecialchars($_POST['newPhotoGame']);
            

            if(!empty($nom) AND !empty($date) AND !empty($price) AND !empty($time) AND !empty($numbersPlayers) AND !empty($idAdmin) AND !empty($idEditeur) AND !empty($age) AND !empty($idCategorie))
            {
    
                  $reqNom = $bdd->prepare("SELECT * FROM deye_jeux WHERE designation = ?");
                  $reqNom->execute(array($nom));
                  $nomExist = $reqNom->rowCount();
                  if($nomExist == 0){
                      $insertGame = $bdd->prepare('INSERT INTO deye_jeux(designation,date_sortie,prix,temps_jeux,nb_joueurs,IdPersonne,IdEditeur,IdAge,IdCategorie,IdPhoto)
                                                    VALUES(?,?,?,?,?,?,?,?,?,?)');
                      $insertGame->execute(array($nom,$date,$price,$time,$numbersPlayers,$idAdmin,$idEditeur,$age,$idCategorie,$idPhoto));
                      $erreur = "Votre jeu a bien été ajouté !";
                  }else{
                    $erreur2 = "Le jeu existe déja !";
                  }
              }else{
                $erreur2 = "Veuillez remplir tous les champs !";
            }

          }
            
                    
        
          if(isset($_GET['type']) AND $_GET['type'] == 'allgames') {
        
            
            if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
            
            $supprime = (int) $_GET['supprime'];
            $req = $bdd->prepare('DELETE FROM deye_jeux WHERE IdJeux = ?');
            $req->execute(array($supprime));


          }
      }

    }else{

      exit();
    }

    
    $allGames = $bdd->query('SELECT IdJeux, designation, date_sortie, prix, temps_jeux, nb_joueurs, deye_personne.nom, deye_editeur.Nom, deye_age.age_requis, deye_categorie.libelle, deye_photo.url_photo
                              FROM deye_jeux
                              INNER JOIN deye_personne ON deye_jeux.IdPersonne = deye_personne.IdPersonne
                              INNER JOIN deye_editeur  ON deye_jeux.IdEditeur = deye_editeur.IdEditeur
                              INNER JOIN deye_age      ON deye_jeux.IdAge = deye_age.IdAge
                              INNER JOIN deye_categorie ON deye_jeux.IdCategorie = deye_categorie.IdCategorie
                              INNER JOIN deye_photo    ON deye_jeux.IdPhoto = deye_photo.IdPhoto
                              ORDER BY IdJeux DESC');
 

  ?>

            
              <!--- Liste tous les jeu --->
              <div class="container-fluid padding">
              <div class="row text-center padding">

  

                <div class="container allGame">
                <div class="row">

                <table class="table">
                <h2>Tous les Jeux </h2> 
                <thead>
                <th>Id</th>
                <th>Nom du jeu</th>
                <th>Date de sortie</th>
                <th>Prix</th>
                <th>Temps de jeu</th>
                <th>Nombre de joueurs</th>
                <th>Nom de l'admin</th>
                <th>Nom de l'éditeur</th>
                <th>Age</th>
                <th>Type de jeu</th>
                <th>Image</th>
                <th>Editer</th>
                </thead>
                <tbody>
                  <?php while($res = $allGames->fetch()){?>
                  <tr class="table-info">
                        
                        <td>
                            <?=$res['IdJeux']?>
                        </td>

                        <td>
                            <?=$res['designation']?>
                        </td>

                        <td>
                            <?=$res['date_sortie']?>
                        </td>

                        <td>
                            <?=$res['prix']?>
                        </td>

                        <td>
                            <?=$res['temps_jeux']?>
                        </td>

                        <td>
                            <?=$res['nb_joueurs']?>
                        </td>

                        <td>
                            <?=$res['nom']?> <!--Nom admin-->
                        </td>

                        <td>
                            <?=$res['Nom']?> <!--Nom de l'éditeur-->
                        </td>

                        <td>
                            <?=$res['age_requis']?>
                        </td>

                        <td>
                            <?=$res['libelle']?>
                        </td>

                        <td>
                            <img src="<?=$res['url_photo']?>"/>
                        </td>

                        <td>   
                            <a href="modifManage/modifGame.php?type=modifgames&idModifGame=<?= $res['IdJeux'] ?>" class="btn btn-primary primary">Modifier</a>
                            <a href="manageGame.php?type=allgames&supprime=<?= $res['IdJeux'] ?>" class="btn btn-danger danger">Supprimer</a>
                        </td>
                                
                    
                    
                  </tr>
                    <?php
                    }
                    ?>
                  </tbody>

                </table>

                </div>
                </div>

                <!--Formulaire pour ajouter un jeu-->
                <div class = "container ajoutUser">
                <div class = "row">

                
                <form method="POST" class="form-inline">
                <h2 class="card-title add_game_title">Ajouter un jeu</h2>
                  <div class="form_add_game">
                    <div class="form-label-group">
                      <label for="inputNameGame">Nom du jeu</label>
                      <input type="text" id="newNameGame" class="form-control" name="newNameGame" placeholder="Insérer le nom du jeu">
                    </div>
                    <div class="form-label-group">
                      <label for="inputDateGame">Date de sortie du jeu</label>
                      <input type="date" id="newDateGame" class="form-control" name="newDateGame" placeholder="">
                    </div>
                    <div class="form-label-group">
                      <label for="inputPriceGame">Prix du jeu</label>
                      <input type="text" id="newPriceGame" class="form-control" name="newPriceGame" placeholder="Ex : 50">
                    </div>
                    <div class="form-label-group">
                      <label for="inputTimeGame">Temps de jeu</label>
                      <input type="time" id="newTimeGame" class="form-control" name="newTimeGame" placeholder="">
                    </div>
                    <div class="form-label-group">
                      <label for="inputNumbersPlayersGame">Nombre de joueurs</label>
                      <input type="text" id="newNumbersPlayersGame" class="form-control" name="newNumbersPlayersGame" placeholder="Ex : 6, 2, 4..">
                    </div>
                    <div class="form-label-group">
                      <label for="inputIdEditeurGame">Id de l'éditeur</label>
                      <input type="text" id="newIdEditeurGame" class="form-control" name="newIdEditeurGame" placeholder="Ex : 1, 2, 3..">
                    </div>
                    <div class="form-label-group">
                      <label for="inputAgeGame">Id de l'Age</label>
                      <input type="text" id="newAgeGame" class="form-control" name="newAgeGame" placeholder="Ex : 1, 2, 3..">
                    </div>
                    <div class="form-label-group">
                      <label for="inputCategorieGame">Id de la Catégorie</label>
                      <input type="text" id="newCategorieGame" class="form-control" name="newCategorieGame" placeholder="Ex : 1, 2, 3..">
                    </div>
                    <div class="form-label-group">
                      <label for="inputCategorieGame">PHOTO</label>
                      <input type="text" id="newPhotoGame" class="form-control" name="newPhotoGame" placeholder="Ex : 1, 2, 3..">
                    </div>
                    <button class="btn btn-md btn-success" name="formaddgame" type="submit">Valider</button>
                    
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
  <?php include('../../include/footer.php') ?>
</body>
</html>