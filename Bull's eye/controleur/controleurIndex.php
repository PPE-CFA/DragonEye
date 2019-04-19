<?php
	include ("modele/modele.php");
	class Controleur
	{
		private $unModele;

	public function __construct ($serveur, $bdd,$user,$mdp)
	{
		//instanciation de la classe modele
		$this->unModele = new Modele ($serveur, $bdd, $user, $mdp);
	}
	public function setTable($uneTable)
	{
		$this->unModele->setTable($uneTable);
	}

	function select_all()
	{
		$resultats=$this->unModele->select_all();
		return $resultats;
	}
}
?>
