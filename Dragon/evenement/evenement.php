<?php
	include ("controleur/controleur.php");
?>

<html>
	<head>
	<title> Les evenements - Dragon's Eyes </title>
	</head>
	<body>
		<center>
		<?php
			//instanciation de la classe controleur
			$unC = new Controleur("localhost","bdd_jeu","root","");
			//un choix de la table pour le Modele
			$unC->setTable("deye_evenement");
			//appel de la methode select_all
			$resultats = $unC->select_all();
			include ("vue/vue_select_classes.php");
		?>
		</center>
	</body>
</html>
