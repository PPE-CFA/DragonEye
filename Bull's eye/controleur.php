<?php
	include 'modele.php'; 
	include 'bdd.php';
	
	class Controleur 
	{
		private $unModele ; 
		
		public function __construct ($serveur, $bdd, $user, $mdp)
		{
			//instanciation de la classe Modele 
			$this->unModele = new Modele ($serveur, $bdd, $user, $mdp);
		}
		public function setTable ($uneTable)
		{
			$this->unModele->setTable($uneTable);
		}
		function select_all ()
		{
			$resultats = $this->unModele->select_all(); //appel de la méthode de selection venant du modele 
			
			// on realise ici des traitements si besoin 
			
			//on retourne les resultats 
			
			return $resultats;
		}
		public function insert ($tab)
		{
			//controler les donnees avant insertion. 
			$this->unModele->insert ($tab);
		}
		public function delete ($where, $operateur)
		{
			$this->unModele->delete ($where, $operateur);
		}
		public function selectWhere ($champs, $where, $operateur)
		{
			return $this->unModele->selectWhere($champs, $where, $operateur);
		}
		
		public function update ($tab, $where, $operateur)
		{
			$this->unModele->update($tab, $where, $operateur);
		}
	}
?>




















