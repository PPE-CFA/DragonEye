<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Dragon's Eye - Edit Annonce</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/manageAdd_style.css" rel="stylesheet">
</head>

<body>
<?php
include('../../include/header.php');
  //requete SQL : supprime une annonce de la table deye_annonce
  if(isset($_SESSION['IdType']) AND $_SESSION['IdType'] == "A"){

    if(isset($_GET['type']) AND $_GET['type'] == 'alloffers') {

      if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
          
 
        $confirme = (int) $_GET['confirme'];
        $O = "O";
        $NO = "NO";
        
        $req = $bdd->prepare('UPDATE deye_annonce SET Idforme = ? WHERE IdAnnonce = ? AND Idforme = ?');
        $req->execute(array($O,$confirme,$NO));

    }
               
      if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
        
        $supprime = (int) $_GET['supprime'];
        $req = $bdd->prepare('DELETE FROM deye_annonce WHERE IdAnnonce = ? AND Idforme = ?');
        $req->execute(array($supprime));

      }

    }elseif(isset($_GET['type']) AND $_GET['type'] == "alldemands"){


      if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
          
 
        $confirme = (int) $_GET['confirme'];
        $D = "D";
        $ND = "ND";
        
        $req = $bdd->prepare('UPDATE deye_annonce SET Idforme = ? WHERE IdAnnonce = ? AND Idforme = ?');
        $req->execute(array($D,$confirme,$ND));

      }

      if(isset($_GET['supprime']) AND !empty($_GET['supprime'])){

        $supprime = (int) $_GET['supprime'];
        $req = $bdd->prepare('DELETE FROM deye_annonce WHERE IdAnnonce = ?');
        $req->execute(array($supprime));

      }
    }elseif(isset($_GET['type']) AND $_GET['type'] == "alladd"){

      if(isset($_get['supprime']) AND !empty($_GET['supprime'])){

        $supprime = (int) $_GET['supprime'];
        $req = $bdd->prepare('DELETE FROM deye_annonce WHERE IdAnnonce = ?');
        $req->execute(array($supprime));


      }
    }

  }else{

    exit();
  }

  $allOffers = $bdd->query('SELECT IdAnnonce, deye_jeux.designation, deye_annonce_type.AnnonceType, deye_personne.nom, deye_photo.url_photo, deye_age.age_requis, deye_categorie.libelle, deye_annonce.Description,region,ville,postal,Etat
                          FROM deye_annonce
                          INNER JOIN deye_jeux     ON deye_annonce.IdJeux=deye_jeux.IdJeux
                          INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
                          INNER JOIN deye_annonce_type ON deye_annonce.Idforme = deye_annonce_type.IdA_type
                          INNER JOIN deye_photo    ON deye_annonce.IdPhoto=deye_photo.IdPhoto
                          INNER JOIN deye_age      ON deye_annonce.IdAge=deye_age.IdAge
                          INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
                          WHERE Idforme = "NO"
                          ORDER BY IdAnnonce DESC');

  $allDemands = $bdd->query('SELECT IdAnnonce, deye_jeux.designation, deye_annonce_type.AnnonceType, deye_personne.nom, deye_photo.url_photo, deye_age.age_requis, deye_categorie.libelle, deye_annonce.Description,region,ville,postal,Etat
                              FROM deye_annonce
                              INNER JOIN deye_jeux     ON deye_annonce.IdJeux=deye_jeux.IdJeux
                              INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
                              INNER JOIN deye_annonce_type ON deye_annonce.Idforme = deye_annonce_type.IdA_type
                              INNER JOIN deye_photo    ON deye_annonce.IdPhoto=deye_photo.IdPhoto
                              INNER JOIN deye_age      ON deye_annonce.IdAge=deye_age.IdAge
                              INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
                              WHERE Idforme = "ND"
                              ORDER BY IdAnnonce DESC');

$allAdd = $bdd->query('SELECT IdAnnonce, deye_jeux.designation, deye_annonce_type.AnnonceType, deye_personne.nom, deye_photo.url_photo, deye_age.age_requis, deye_categorie.libelle, deye_annonce.Description,region,ville,postal,Etat
                            FROM deye_annonce
                            INNER JOIN deye_jeux     ON deye_annonce.IdJeux=deye_jeux.IdJeux
                            INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
                            INNER JOIN deye_annonce_type ON deye_annonce.Idforme = deye_annonce_type.IdA_type
                            INNER JOIN deye_photo    ON deye_annonce.IdPhoto=deye_photo.IdPhoto
                            INNER JOIN deye_age      ON deye_annonce.IdAge=deye_age.IdAge
                            INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
                            WHERE Idforme = "O" OR Idforme = "D"
                            ORDER BY IdAnnonce DESC');




?>


<!--- Tableau  de toutes les nouvelles demandes avec bouton supprimer et confirmer-->

            <div class="container-fluid padding">     
            <div class="row text-center padding">

  

              <div class="container allAdd">
              <div class="row">

              <table class="table">
              <h2>Toutes les nouvelles demandes </h2> 
              <thead>
              <th>Id</th>
              <th>Jeux</th>
              <th>Type d'annonce</th>
              <th>Personne</th>
              <th>Photo</th>
              <th>Age</th>
              <th>Catégorie</th>
              <th>Région</th>
              <th>Ville</th>
              <th>Code postal</th>
              <th>Etat</th>
              <th>Description</th>
              <th>Editer</th>
                
              </thead>
                <tbody>
                  <?php while($res = $allDemands->fetch()){?>
                  <tr class="table-info">
                        
                      <td>
                          <?=$res['IdAnnonce']?>
                      </td>

                      <td>
                          <?=$res['designation']?>
                      </td>

                      <td>
                        <?=$res['AnnonceType']?>
                      </td>

                      <td>
                          <?=$res['nom']?>
                      </td>

                      <td>  
                        <img src="<?=$res['url_photo']?>"/>    
                      </td>

                      <td>
                        <?=$res['age_requis']?>
                      </td>

                      <td>
                        <?=$res['libelle']?>
                      </td>

                      <td>
                        <?=$res['region']?>
                      </td>

                      <td>
                        <?=$res['ville']?>
                      </td>

                      <td>
                        <?=$res['postal']?>
                      </td>

                      <td>
                        <?=$res['Etat']?>
                      </td>

                      <td>
                        <?=$res['Description']?>
                      </td>

                      <td>   
                        <a href="manageAdd.php?type=alldemands&confirme=<?= $res['IdAnnonce'] ?>" class="btn btn-success">Confirmer</a>
                        <a href="manageAdd.php?type=alldemands&supprime=<?= $res['IdAnnonce'] ?>" class="btn btn-danger danger">Supprimer</a>
                      </td>
                                
                    
                    
                  </tr>
                <?php
                  }
                ?>
              </tbody>

              </table>

              </div>
              </div>

              </div>
              </div>

  <!--- Tableau  de toutes les nouvelles offres avec bouton supprimer et confirmer-->

              <div class="container-fluid padding">     
              <div class="row text-center padding">

  

                <div class="container allAdd">
                <div class="row">

                <table class="table">
                <h2>Toutes les nouvelles offres </h2> 
                <thead>
                <th>Id</th>
                <th>Jeux</th>
                <th>Type d'annonce</th>
                <th>Personne</th>
                <th>Photo</th>
                <th>Age</th>
                <th>Catégorie</th>
                <th>Région</th>
                <th>Ville</th>
                <th>Code postal</th>
                <th>Etat</th>
                <th>Description</th>
                <th>Editer</th>
                
                </thead>
                <tbody>
                  <?php while($res = $allOffers->fetch()){?>
                  <tr class="table-info">
                        
                        <td>
                            <?=$res['IdAnnonce']?>
                        </td>

                        <td>
                            <?=$res['designation']?>
                        </td>

                        <td>
                          <?=$res['AnnonceType']?>
                        </td>

                        <td>
                            <?=$res['nom']?>
                        </td>

                        <td>
                            
                            <img src="<?=$res['url_photo']?>"/>    
                        </td>

                        <td>
                            <?=$res['age_requis']?>
                        </td>

                        <td>
                            <?=$res['libelle']?>
                        </td>

                        <td>
                            <?=$res['region']?>
                        </td>

                        <td>
                            <?=$res['ville']?>
                        </td>

                        <td>
                            <?=$res['postal']?>
                        </td>

                        <td>
                            <?=$res['Etat']?>
                        </td>

                        <td>
                            <?=$res['Description']?>
                        </td>

                        <td>   
                            <a href="manageAdd.php?type=alloffers&confirme=<?= $res['IdAnnonce'] ?>" class="btn btn-success">Confirmer</a>
                            <a href="manageAdd.php?type=alloffers&supprime=<?= $res['IdAnnonce'] ?>" class="btn btn-danger danger">Supprimer</a>
                        </td>
                                
                    
                    
                  </tr>
                    <?php
                    }
                    ?>
                  </tbody>

                </table>

                </div>
                </div>

                </div>
                </div>

<!--- Tableau  de toutes les annonces avec bouton supprimer-->

              <div class="container-fluid padding">     
              <div class="row text-center padding">

  

                <div class="container allAdd">
                <div class="row">

                <table class="table">
                <h2>Toutes les annonces </h2> 
                <thead>
                <th>Id</th>
                <th>Jeux</th>
                <th>Type d'annonce</th>
                <th>Personne</th>
                <th>Photo</th>
                <th>Age</th>
                <th>Catégorie</th>
                <th>Région</th>
                <th>Ville</th>
                <th>Code postal</th>
                <th>Etat</th>
                <th>Description</th>
                <th>Editer</th>
                
                </thead>
                <tbody>
                  <?php while($res = $allAdd->fetch()){?>
                  <tr class="table-info">
                        
                        <td>
                            <?=$res['IdAnnonce']?>
                        </td>

                        <td>
                            <?=$res['designation']?>
                        </td>

                        <td>
                          <?=$res['AnnonceType']?>
                        </td>

                        <td>
                            <?=$res['nom']?>
                        </td>

                        <td>
                            
                            <img src="<?=$res['url_photo']?>"/>    
                        </td>

                        <td>
                            <?=$res['age_requis']?>
                        </td>

                        <td>
                            <?=$res['libelle']?>
                        </td>

                        <td>
                            <?=$res['region']?>
                        </td>

                        <td>
                            <?=$res['ville']?>
                        </td>

                        <td>
                            <?=$res['postal']?>
                        </td>

                        <td>
                            <?=$res['Etat']?>
                        </td>

                        <td>
                            <?=$res['Description']?>
                        </td>

                        <td>   
                            
                            <a href="manageAdd.php?type=alladd&supprime=<?= $res['IdAnnonce'] ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                                
                    
                    
                  </tr>
                    <?php
                    }
                    ?>
                  </tbody>

                </table>

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