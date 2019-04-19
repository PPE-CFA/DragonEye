<?php
	class Modele
	{

		private $pdo, $table;

	public function __construct($serveur, $bdd, $user, $mdp)
	{
		$this->pdo = null;
		try{
			$this->pdo = new PDO ("mysql:host="$serveur.";dbname=".$bdd,$user,$mdp);
		}
		catch (PDOException $exp)
		{
			echo "erreur de connexion à la base de données ";
		}

	}

	public function select_all()
	{

		if ($this->pdo == null) //pas de connexion
		{
			return null;
		}else
		{
			$requete = "select * from ".$this->table.";";
			$select = $this->pdo->prepare ($requete);
			$select ->execute ();
			$resultats = $select->fetchAll();
			return $resultats;
		}
	}

	public function setTable($uneTable)
	{
		$this->table = $uneTable;
	}
}
?>
