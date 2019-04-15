<?php
  class AnnonceModele
  {
    private $pdo, $table;

  public function __construct($serveur, $bdd, $user, $mdp)
  {
    $this->pdo = null;
    try{
      $this->pdo = new PDO ("mysql:host=".$serveur.";dbname=".$bdd,$user,$mdp);
    }
    catch (PDOException $exp)
    {
      echo "erreur de connexion à la base de données ";
    }
  }

  	public function select_Annonce()
  	{
  	  if ($this->pdo == null) //pas de connexion
  	  {
  	    return null;
  	  }else
  	  {
  	    $requete = "select IdAnnonce, designation, nom, url, age_requis, libelle, Description
  	      FROM deye_annonce
  	      INNER JOIN deye_jeux ON deye_annonce.IdJeux=deye_jeux.IdJeux
  	      INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
  	      INNER JOIN deye_photo ON deye_annonce.IdPhoto=deye_photo.IdPhoto
  	      INNER JOIN deye_trancheage ON deye_annonce.Id_tranche_age=deye_trancheage.Id_tranche_age
  	      INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie;";
  	    $select = $this->pdo->prepare ($requete);
  	    $select ->execute ();
  	    $resultats = $select->fetchAll();
  	    return $resultats;
  	  }
		}
		
		public function select_Annonce_recent()
  	{
  	  if ($this->pdo == null) //pas de connexion
  	  {
  	    return null;
  	  }else
  	  {
  	    $requete = "select IdAnnonce, designation, nom, url, age_requis, libelle, Description
  	      FROM deye_annonce
  	      INNER JOIN deye_jeux ON deye_annonce.IdJeux=deye_jeux.IdJeux
  	      INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
  	      INNER JOIN deye_photo ON deye_annonce.IdPhoto=deye_photo.IdPhoto
  	      INNER JOIN deye_trancheage ON deye_annonce.Id_tranche_age=deye_trancheage.Id_tranche_age
					INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
					ORDER BY date_validation
					LIMIT 5;";
  	    $select = $this->pdo->prepare ($requete);
  	    $select ->execute ();
  	    $resultats = $select->fetchAll();
  	    return $resultats;
  	  }
  	}

  	public function setTableAnnonce($uneTableAnnonce)
  	{
  		$this->table = $uneTableAnnonce;
  	}
  }
?>
