<?php

// constantes qu'on ne doit pas changer
// constantes qu'on peut changer
/**
 * Plus l'information n'est pas importante, plus le numéro de debug est grand.
 */
define("DEBUG", 0);

try {

    $host = "213.32.79.219";
    $dbname = "dragoneye";
    $user =  "dragoneye";
    $mdp = "NeGMzgKL8MlLmdzZ";
  
    $port = "3306";
    define("CHEMIN_DOCUMENTS", __DIR__ ."\\images\\");


    $dsn = "mysql:hostname=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $mdp);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Echec de la connexion : ' . $e->getMassege();
}
?>