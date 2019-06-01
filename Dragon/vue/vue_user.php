<?php if(isset($_SESSION["IdPersonne"]) AND $_SESSION["IdPersonne"] > 0){
    echo '<a href="'._DIR_.'/profil/profil.php" class="btn btn-primary">'.$user['Nom'].' '.$user['Prenom'].'</a>';
}else{
    echo '<a href="'._DIR_.'/connexion/inscription.php" class="btn btn-primary">S\'inscrire/Se connecter</a>';
}?>