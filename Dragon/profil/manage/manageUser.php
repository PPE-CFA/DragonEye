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
<!--- Navigation --->
  <nav class = "navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php"><img src ="../../img/logo.png"></a>
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
              session_start();

              $bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu', 'root', '');

              if(isset($_SESSION["IdPersonne"]) AND $_SESSION["IdPersonne"] > 0){
                $requser = $bdd->prepare("SELECT * FROM deye_personne WHERE IdPersonne = ?");
                $requser->execute(array($_SESSION['IdPersonne']));
                $user = $requser->fetch();
            ?>
              <a href="../../profil/profil.php" class="btn btn-primary"><?= $user['nom'];?> <?=$user['prenom'];?></a>
            <?php
              }else{
            ?>
                <a href="../../connexion/inscription.php" class="btn btn-primary">S'inscrire/Se connecter</a>
            <?php
              }
            ?>            
		    </li>
		</ul>
		</div>
		</div>
  </nav>

  <?php

    

    $bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu;charset=utf8', 'root', '');

    if(isset($_SESSION['IdType']) AND $_SESSION['IdType'] == "A"){

      
      
        //confirme un nouvel user
    if(isset($_GET['type']) AND $_GET['type'] == 'newmembre') {
        if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
          
 
            $confirme = (int) $_GET['confirme'];
            $U = "U";
            $N = "N";
            $req = $bdd->prepare('UPDATE deye_personne SET IdType = ? WHERE IdPersonne = ? AND IdType = ?');
            $req->execute(array($U,$confirme,$N));

   
        }
            //supprime un nouvel user
            
          if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
            
            $supprime = (int) $_GET['supprime'];
            $N = "N";
            $req = $bdd->prepare('DELETE FROM deye_personne WHERE IdPersonne = ? AND IdType = ?');
            $req->execute(array($supprime,$N));


        }
        //supprime un utilisateur
        }elseif(isset($_GET['type']) AND $_GET['type'] == 'allmembre') {

        $supprime = (int) $_GET['supprime'];
            $U = "U";
            $req = $bdd->prepare('DELETE FROM deye_personne WHERE IdPersonne = ? AND IdType = ?');
            $req->execute(array($supprime,$U));
        }
    }
    else{
      exit();
    }

    
    $membres = $bdd->query('SELECT * FROM deye_personne WHERE IdType = "N" ORDER BY IdPersonne DESC LIMIT 0,5');
    $allMembres = $bdd->query('SELECT * FROM deye_personne WHERE IdType ="U" ORDER BY IdPersonne DESC');

    

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
                        <?=$res['IdPersonne']?>
                    </td>

                    <td>
                        <?=$res['IdType']?>
                    </td>

                    <td>
                        <?=$res['nom']?>
                    </td>

                    <td>
                        <?=$res['prenom']?>
                    </td>

                    <td>
                        <?=$res['email']?>
                    </td>

                    <td>
                    
                        <?php if($res['IdType'] == "N") { ?>  
                            <a href="manageUser.php?type=newmembre&confirme=<?= $res['IdPersonne'] ?>" class="btn btn-success">Confirmer</a>
                        <?php } ?> 
                            
                        <a href="manageUser.php?type=newmembre&supprime=<?= $res['IdPersonne'] ?>" class="btn btn-danger">Supprimer</a>
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
                            <?=$res['IdPersonne']?>
                        </td>

                        <td>
                            <?=$res['IdType']?>
                        </td>

                        <td>
                            <?=$res['nom']?>
                        </td>

                        <td>
                            <?=$res['prenom']?>
                        </td>

                        <td>
                            <?=$res['email']?>
                        </td>

                        <td>  
                            <a href="modifManage/modifUser.php?type=allmembre&modifUser=<?= $res['IdPersonne'] ?>" class="btn btn-primary">Modifier</a>  
                            <a href="manageUser.php?type=allmembre&supprime=<?= $res['IdPersonne'] ?>" class="btn btn-danger">Supprimer</a>
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

  






  <!---Bas de page-->

<footer>
<div class="container-fluid padding">
<div class="row text-center">
  <div class="col-md-4">
    <img src="../../img/logo.png">
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
    <img src="../../img/focus_home_interactive_logo.svg" class="partenaire_logo" alt="partenaire">
    <img src="../../img/novatim_logo.png" class="partenaire_logo" alt="article">
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