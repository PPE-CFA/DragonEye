<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Dragon Eye's - Edit User</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/manageUser_style.css" rel="stylesheet">
</head>

<body>
  <?php
    include('../../include/header.php');

    if(isset($_SESSION['IdType']) AND $_SESSION['IdType'] == "A"){
      //confirme un nouvel user
      if(isset($_GET['type']) AND $_GET['type'] == 'newmembre') {
        if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
          $confirme = (int) $_GET['confirme'];
          $unC_user->updateUser('', '', $confirme, 'confirm');
        }
        //supprime un nouvel user
        if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
          $supprime = (int) $_GET['supprime'];
          $unC_user->updateUser('', '', $supprime, 'supprime');
        }
        //supprime un utilisateur
      }elseif(isset($_GET['type']) AND $_GET['type'] == 'allmembre') {
        $supprime = (int) $_GET['supprime'];
        $unC_user->updateUser('', '', $supprime, 'supprime_user');
      }
    }else{
      exit();
    }

    
    //$membres = $bdd->query('SELECT * FROM deye_personne WHERE IdType = "N" ORDER BY IdPersonne DESC LIMIT 0,5');
    //$allMembres = $bdd->query('SELECT * FROM deye_personne WHERE IdType ="U" ORDER BY IdPersonne DESC');

    $membres = $unC_user->select_Membre();
    $allMembres = $unC_user->select_allMembre();
  ?>

            <!--- Liste les 5 derniers nouveaux utilisateurs --->
            <div class="container-fluid padding">
            <div class="row text-center padding">

  

              <div class="container newUser">
              <div class="row">

              <table class="table">
              <h2>Nouvel Utilisateur</h2>
              <thead>
                <th>Id</th>
                <th>IdType</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Editer</th>
              </thead>
              <tbody>
              <?php while($res = $membres->fetch()){?>
              <tr class="table-info">
                    
                    <td>
                        <?=$res['idPersonne']?>
                    </td>

                    <td>
                        <?=$res['idType']?>
                    </td>

                    <td>
                        <?=$res['Nom']?>
                    </td>

                    <td>
                        <?=$res['Prenom']?>
                    </td>

                    <td>
                        <?=$res['Email']?>
                    </td>

                    <td>
                    
                        <?php if($res['idType'] == "N") { ?>  
                            <a href="manageUser.php?type=newmembre&confirme=<?= $res['idPersonne'] ?>" class="btn btn-success">Confirmer</a>
                        <?php } ?> 
                            
                        <a href="manageUser.php?type=newmembre&supprime=<?= $res['idPersonne'] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                            
                
                
              </tr>
                <?php
                }
                ?>
              </tbody>
              </table>

              </div>
              </div>


              <!--- Liste tous les utilisateurs --->
              
  

                <div class="container allUser">
                <div class="row">

                <table class="table">
                <h2>Tous les Utilisateurs </h2> 
                <thead>
                <th>Id</th>
                <th>IdType</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Editer</th>
                </thead>
                <tbody>
                  <?php while($res = $allMembres->fetch()){?>
                  <tr class="table-info">
                        
                        <td>
                            <?=$res['idPersonne']?>
                        </td>

                        <td>
                            <?=$res['idType']?>
                        </td>

                        <td>
                            <?=$res['Nom']?>
                        </td>

                        <td>
                            <?=$res['Prenom']?>
                        </td>

                        <td>
                            <?=$res['Email']?>
                        </td>

                        <td>  
                            <a href="modifManage/modifUser.php?type=allmembre&modifUser=<?= $res['idPersonne'] ?>" class="btn btn-primary">Modifier</a>  
                            <a href="manageUser.php?type=allmembre&supprime=<?= $res['idPersonne'] ?>" class="btn btn-danger">Supprimer</a>
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