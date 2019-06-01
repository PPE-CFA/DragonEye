<?php
	$sql_serveur  = "213.32.79.219"; 			// Serveur
	$sql_user 	  =  "dragoneye";        // Utilisateur
	$sql_pass	  = "";          // Mot de passe
	$sql_database = "dragoneye.sql";    // Base de données

	//connexion avec PDO
	try {
		$db = new PDO('mysql:hostname='.$sql_serveur.';dbname='.$sql_database.';charset=utf8mb4', $sql_user, $sql_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo "Erreur de connexion a la base";
		die('Erreur : ' . $e->getMessage());
	}
?>
