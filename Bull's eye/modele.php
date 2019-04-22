<?php
	include 'bdd.php';
	
	class Modele 
	{
		private $pdo , $table ;
		
		public function __construct ($serveur, $bdd, $user, $mdp)
		{
			$this->pdo = null; 
			try{
				$this->pdo = new PDO ("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp);
			}
			catch (PDOException $exp)
			{
				echo "erreur de connexion à la base de données "; 
			}
		}
		
		public function select_all()
		{
			if ($this->pdo == null ) //pas de connexion 
			{
				return null;
			}else {
				$requete ="select * from Table".$this->table.";" ; 
				$select = $this->pdo->prepare ($requete);
				$select ->execute (); 
				$resultats = $select->fetchAll(); 
				return $resultats;
			}
		}
		
		public function setTable ($uneTable)
		{
			$this->table = $uneTable;
		}
		
		public function insert ($tab)
		{
			if ($this->pdo== null)
			{
				
				return null;
			}else {
				$champs = array(); 
				$donnees = array();
				foreach ($tab as $cle =>$valeur)
				{
					$champs [] = ":".$cle ; 
					$donnees[":".$cle] = $valeur; 
				}
				$chaineChamps = implode(",", $champs);
				$requete = "insert into ".$this->table." values (null,".$chaineChamps.");"; 
				$insert = $this->pdo->prepare($requete);
				$insert->execute($donnees);
			}
		}
		public function delete ($where, $operateur)
		{
			if ($this->pdo == null)
			{
				return null;
			}else {
				$donnees = array();
				$champs = array(); 
				foreach($where as $cle=>$valeur)
				{
					$champs[] = $cle." = :".$cle;
					$donnees[":".$cle]= $valeur;
				}
				$chaineWhere=implode($operateur, $champs);
				
				$requete = "delete from ".$this->table." where ".$chaineWhere.";";
				$delete = $this->pdo->prepare($requete);
				$delete->execute ($donnees);
			}
		}
			
		public function selectWhere ($champs, $where, $operateur)
		{
			if ($this->pdo == null)
			{
				return null ;
			}
			else {
				$donnees = array();
				$champsWhere = array();
				foreach($where as $cle =>$valeur )
				{
					$champsWhere[] = $cle." =:".$cle; 
					$donnees [":".$cle] = $valeur;
				}
				$chaineWhere = implode ($operateur, $champsWhere);
				
				$chaineChamps = implode(",", $champs);
				
				$requete ="select  ".$chaineChamps." from " .$this->table."  where ".$chaineWhere.";";
				$select = $this->pdo->prepare($requete);
				$select->execute ($donnees);
				$resultats=$select->fetchAll();
				return $resultats ;
			}
		}		
		
		public function update ($tab, $where , $operateur)
		{
			if ($this->pdo == null)
			{
				return null ;
			}else 
			{
				$donnees =array();
				$champsWhere = array(); 
				$champs = array();
				foreach ($tab as $cle =>$valeur)
				{
					$champs[] = $cle."=:".$cle; 
					$donnees[":".$cle] = $valeur;
				}
				$chaineChamps = implode (",", $champs); 
				
				foreach ($where as $cle =>$valeur)
				{
					$champsWhere[] = $cle."=:".$cle;
					$donnees[":".$cle] = $valeur;
				}
				$chaineWhere = implode ($operateur, $champsWhere);
				
				$requete = "update ".$this->table." set ".$chaineChamps." where ".$chaineWhere.";";
				$update = $this->pdo->prepare($requete);
				$update ->execute($donnees);
			}
		}
	}
?>




































