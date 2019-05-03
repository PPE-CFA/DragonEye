<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Dragon Eye's - Inscription / Connexion</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/inscription_style.css" rel="stylesheet">
</head>

<body>
  <?php include('../include/header.php')?>


    <?php

      $bdd = new PDO('mysql:host=localhost;dbname=bdd_jeu', 'root', '');

      //Requete SQL : connecte un utilisateur

      if(isset($_POST['formconnexion'])) {
        $mailconnect = $_POST['mailconnect'];
        $mdpconnect = $_POST['mdpconnect'];

        if(!empty($mailconnect) AND !empty($mdpconnect))
        {
          $requser = $bdd->prepare("SELECT * FROM deye_personne WHERE email = ? AND mdp = ?");
          $requser->execute(array($mailconnect,$mdpconnect));
          $userexist = $requser->rowCount();
          if($userexist == 1){

            $userinfo = $requser->fetch();
            $_SESSION['IdPersonne'] = $userinfo['IdPersonne'];
            $_SESSION['IdType'] = $userinfo['IdType'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['email'] = $userinfo['email'];
            $_SESSION['mdp'] = $userinfo['mdp'];
            header("Location: ../profil/profil.php?id=".$_SESSION['IdPersonne']);

          }
          else
          {
            $erreurConnect = "Mauvais mail ou mot de passe !";
          }

        }
        else
        {

          $erreurConnect = "Tous les champs doivent être remplies !";
        }
      }

    ?>


    

    <?php
          $bdd = new PDO('mysql:host=localhost;dbname=bdd_jeu', 'root', '');

          //Requete SQL : inscrit un utilisateur

          if(isset($_POST['forminscription'])) {

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $mail = $_POST['mail'];
            $mail2 = $_POST['mail2'];
            $mdp = $_POST['mdp'];
            $mdp2 = $_POST['mdp2'];
            $n = "N";
            

            if(!empty($mail) AND !empty($mail2) AND !empty($mdp) AND !empty($mdp2) AND !empty($nom) AND !empty($prenom))
            {
              if($mail==$mail2){
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                  $reqmail = $bdd->prepare("SELECT * FROM deye_personne WHERE email = ?");
                  $reqmail->execute(array($mail));
                  $mailexist = $reqmail->rowCount();
                  if($mailexist == 0){
                    if($mdp == $mdp2){
                      $insertmbr = $bdd->prepare("INSERT INTO deye_personne(IdType,nom,prenom,email,mdp) VALUES(?,?,?,?,?)");
                      $insertmbr->execute(array($n,$nom,$prenom,$mail,$mdp));
                      $erreur = "Votre compte a bien été crée !";
                    } else {
                      $erreur2 = "Vos mots de passe ne correspondent pas !";
                    }
                  } else {
                    $erreur2 = "Votre adresse email a déjà été utilisé !";
                  }
                }else{
                  $erreur2 = "Votre adresse email n'est pas valide !";
                }
              }else{
                $erreur2 = "Vos adresse email ne correspondent pas ! ";
              }
            }else{
              $erreur2 = "Tous les champs doivent être complétés !";
            }

          }
            
    ?>


    
    
    <div class="container-fluid padding">
    <div class="row text-center padding">


    <!--- FORM Connexion--->

   
    <div class="connexion_title">

    <h2>Deja inscrit ? Connectez-vous !</h2>
    <div class="col-md-5">
    <form method="POST" class="form-signin">

            <div class="sign_in">
            <h5 class="card-title text-center">Connexion</h5>
            
              <div class="form-label-group">
                <label for="inputEmail">Email</label>
                <input type="email" id="mailconnect" class="form-control" name="mailconnect" placeholder="Email">
              </div>
              
              <div class="form-label-group">
                <label for="inputMdp">Mot de passe</label>
                <input type="password" id="mdpconnect" class="form-control" name="mdpconnect" placeholder="Mot de passe">
              </div>
              
              <button class="btn btn-lg btn-secondary btn-block text-uppercase" name="formconnexion" type="submit">Go !</button>
              </div>

    </form>
    <?php
    if(isset($erreurConnect)) {
            echo '<font color="red" class="erreur">'.$erreurConnect."</font>";
    }
    
    ?>
    </div>
    </div>


    <div class="vertical_line"></div>


    
    
    <div class="col-sm-3 offset-sm-7">
  
    <!---  FORM Inscription -->
    
    <form method="POST" class="form-signup">
      
            <div class="sign_up">
            <h4 class="card-title text-center">Inscription</h4>
              <div class="form-label-group">
                <label for="inputInscription">Nom</label>
                <input type="text" id="nom" class="form-control" name="nom" placeholder="Entrer votre nom">
              </div>
              <div class="form-label-group">
                <label for="inputPrenom">Prenom</label>
                <input type="text" id="prenom" class="form-control" name="prenom" placeholder="Entrer votre prenom">
              </div>
              <div class="form-label-group">
                <label for="inputEmail">Email</label>
                <input type="email" id="mail" class="form-control" name="mail" placeholder="Email">
              </div>
              <div class="form-label-group">
                <label for="inputEmail">Confirmer l'email</label>
                <input type="email" id="mail2" class="form-control" name="mail2" placeholder="Confirmer l'email">
              </div>
              <div class="form-label-group">
                <label for="inputMdp">Mot de passe</label>
                <input type="password" id="mdp" class="form-control" name="mdp" placeholder="Mot de passe">
              </div>
              <div class="form-label-group">
                <label for="inputMdp2">Confirmer mot de passe</label>
                <input type="password" id="mdp2" class="form-control" name="mdp2" placeholder="Confirmer mot de passe">
              </div>
            
              
              <button class="btn btn-lg btn-secondary btn-block text-uppercase" name="forminscription" type="submit">Go !</button>
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
    </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  <?php include('../include/footer.php') ?>
</body>
</html>