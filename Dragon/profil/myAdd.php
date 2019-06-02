<!-- Requete SQL : 
        - supprime une offre ou une demande de la table annonce
        - affiche toutes les données des offres/demandes de la table annonces-->
<?php
    include('../include/header.php');
    //page specific controller
    include(_DIR2_.'/controleur/controleurOffre.php');
    $unC_offre = new ControleurOffre($host, $bdd_nom, $bdd_user, $mdp);
    include(_DIR2_.'/controleur/controleurDemande.php');
    $unC_demande = new ControleurDemande($host, $bdd_nom, $bdd_user, $mdp);

    if(isset($_GET['type']) AND $_GET['type'] == 'allmydemands'){

        if(isset($_GET['supprime']) AND !empty($_GET['supprime']))
        {
            $supprime = (int) $_GET['supprime'];
            $req = $bdd->prepare('DELETE FROM deye_annonce WHERE IdAnnonce = ?');
            $req->execute(array($supprime));
        }
    }elseif(isset($_GET['type']) AND $_GET['type'] == 'allmyoffers'){

        if(isset($_GET['supprime']) AND !empty($_GET['supprime']))
        {
            $supprime = (int) $_GET['supprime'];
            $req = $bdd->prepare('DELETE FROM deye_annonce WHERE IdAnnonce = ?');
            $req->execute(array($supprime));
            var_dump($req->execute(array($supprime)));
        }
    }
    //$allMyOffers = $bdd->query('SELECT * FROM deye_annonce
                                //INNER JOIN deye_jeux ON deye_annonce.IdJeux=deye_jeux.IdJeux
                                //WHERE Idforme = "O"');
    $allMyOffers = $unC_offre->select_userOffre($_SESSION['IdPersonne']);
    
    /*$allMyDemands = $bdd->prepare('SELECT IdAnnonce, deye_jeux.designation, deye_annonce_type.AnnonceType, deye_personne.nom, deye_photo.url_photo, deye_age.age_requis, deye_categorie.libelle, deye_annonce.Description,region,ville,postal,Etat
                                    FROM deye_annonce
                                    INNER JOIN deye_jeux     ON deye_annonce.IdJeux=deye_jeux.IdJeux
                                    INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
                                    INNER JOIN deye_annonce_type ON deye_annonce.Idforme = deye_annonce_type.IdA_type
                                    INNER JOIN deye_photo    ON deye_annonce.IdPhoto=deye_photo.IdPhoto
                                    INNER JOIN deye_age      ON deye_annonce.IdAge=deye_age.IdAge
                                    INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
                                    WHERE IdPersonne = ? AND Idforme = "D"
                                    ORDER BY IdAnnonce DESC');*/
    $allMyDemands = $unC_demande->select_userDemande($_SESSION['IdPersonne']);
    //$allMyDemands->execute(array($_SESSION['IdPersonne']));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Bull's Eye</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/myAdd_style.css" rel="stylesheet">
</head>

<body>
<!-- Tableau de toutes les demandes de l'utilisateur -->

<div class="m-top-100 container-fluid padding">     
    <div class="row text-center padding">

    <div class="container allMyDemands">
    <div class="row">

        <table class="table">
        <h2>Toutes mes demandes </h2> 
            <thead>
                <th>Jeux</th>
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
                <?php while($res = $allMyDemands->fetch()){?>
                <tr class="table-info">

                      
                <td>
                    <?=$res['designation']?>
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
                    
                    <a href="myAdd.php?type=allmydemands&supprime=<?= $res['IdAnnonce'] ?>" class="btn btn-danger danger">Supprimer</a>
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
    

<!-- Tableau de toutes les demandes de l'utilisateur -->

<div class="container-fluid padding">     
    <div class="row text-center padding">

    <div class="container allMyOffers">
    <div class="row">

        <table class="table">
        <h2>Toutes mes offres </h2> 
            <thead>
                <th>Jeux</th>
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
                <?php while($res = $allMyOffers->fetch()){?>
                <tr class="table-info">
                        

                      
                <td>
                    <?=$res['designation']?>
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
                    
                    <a href="myAdd.php?type=allmyoffers&supprime=<?= $res['IdAnnonce'] ?>" class="btn btn-danger danger">Supprimer</a>
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
    <?php include('../include/footer.php') ?>
</body>
</html>