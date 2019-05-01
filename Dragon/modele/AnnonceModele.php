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
				$pdo = new PDO('mysql:host=127.0.0.1;dbname=bdd_jeu;charset=utf8', 'root', '');
				$resultats = $pdo->query('SELECT IdAnnonce, deye_jeux.designation, deye_annonce_type.AnnonceType, deye_personne.nom, deye_photo.url_photo,
					deye_age.age_requis, deye_categorie.libelle, deye_annonce.Description,region,ville,postal,Etat,deye_personne.prenom,
					deye_jeux.prix, deye_jeux.date_sortie, deye_jeux.nb_joueurs, deye_jeux.temps_jeux, deye_personne.email
					FROM deye_annonce
					INNER JOIN deye_jeux     ON deye_annonce.IdJeux=deye_jeux.IdJeux
					INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
					INNER JOIN deye_annonce_type ON deye_annonce.Idforme = deye_annonce_type.IdA_type
					INNER JOIN deye_photo    ON deye_annonce.IdPhoto=deye_photo.IdPhoto
					INNER JOIN deye_age      ON deye_annonce.IdAge=deye_age.IdAge
					INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
					WHERE idA_type = "NO"
					ORDER BY IdAnnonce DESC 
					LIMIT 0,3');
  	    return $resultats;
  	  }
		}
		
		public function select_Demandes()
  	{
  	  if ($this->pdo == null) //pas de connexion
  	  {
  	    return null;
  	  }else
  	  {
  	    $resultats = $this->pdo->query('SELECT IdAnnonce, deye_jeux.designation, deye_annonce_type.AnnonceType, deye_personne.nom, deye_photo.url_photo,
					deye_age.age_requis, deye_categorie.libelle, deye_annonce.Description,region,ville,postal,Etat,deye_personne.prenom,
					deye_jeux.prix, deye_jeux.date_sortie, deye_jeux.nb_joueurs, deye_jeux.temps_jeux, deye_personne.email
					FROM deye_annonce
					INNER JOIN deye_jeux     ON deye_annonce.IdJeux=deye_jeux.IdJeux
					INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
					INNER JOIN deye_annonce_type ON deye_annonce.Idforme = deye_annonce_type.IdA_type
					INNER JOIN deye_photo    ON deye_annonce.IdPhoto=deye_photo.IdPhoto
					INNER JOIN deye_age      ON deye_annonce.IdAge=deye_age.IdAge
					INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
					WHERE idA_type = "ND"
					ORDER BY IdAnnonce DESC 
					LIMIT 3');
  	    return $resultats;
  	  }
		}
		
  	public function setTableAnnonce($uneTableAnnonce)
  	{
  		$this->table = $uneTableAnnonce;
  	}
  }
?>
