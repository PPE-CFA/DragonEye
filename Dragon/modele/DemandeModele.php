<?php
  class DemandeModele
  {
    private $pdo, $table;

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->pdo = null;
        try{
            var_dump($bdd.', '.$user);
            $this->pdo = new PDO ("mysql:hostname=".$serveur.";dbname=".$bdd,$user,$mdp,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        }
        catch (PDOException $exp)
        {
            var_dump($serveur, $bdd, $user, $mdp);
            echo "erreur de connexion à la base de données";
        }
    }

  	public function select_allDemande()
  	{
        if ($this->pdo == null){//pas de connexion
            return null;
        }else{
            $sql = 'SELECT IdAnnonce, deye_jeux.designation, deye_annonce_type.Annonce_Type, deye_personne.nom, deye_photo.url_photo,
                        deye_age.age_requis, deye_categorie.libelle, deye_annonce.Description,region,ville,postal,Etat,deye_personne.prenom,
                        deye_jeux.prix, deye_jeux.date_sortie, deye_jeux.nb_joueurs, deye_jeux.temps_jeux, deye_personne.email,Depot
                        FROM deye_annonce
                        INNER JOIN deye_jeux     ON deye_annonce.IdJeux=deye_jeux.IdJeux
                        INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
                        INNER JOIN deye_annonce_type ON deye_annonce.Idforme = deye_annonce_type.IdA_type
                        INNER JOIN deye_photo    ON deye_annonce.IdPhoto=deye_photo.IdPhoto
                        INNER JOIN deye_age      ON deye_annonce.IdAge=deye_age.IdAge
                        INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
                        WHERE Idforme = "D"
                        ORDER BY IdAnnonce DESC';
            $stmt = $this->pdo->query($sql);
            return $stmt;
        }
    }

    public function select_allNewDemande()
  	{
        if ($this->pdo == null){//pas de connexion
            return null;
        }else{
            $sql = 'SELECT IdAnnonce, deye_jeux.designation, deye_annonce_type.Annonce_Type, deye_personne.nom, deye_photo.url_photo,
                        deye_age.age_requis, deye_categorie.libelle, deye_annonce.Description,region,ville,postal,Etat,deye_personne.prenom,
                        deye_jeux.prix, deye_jeux.date_sortie, deye_jeux.nb_joueurs, deye_jeux.temps_jeux, deye_personne.email,Depot
                        FROM deye_annonce
                        INNER JOIN deye_jeux     ON deye_annonce.IdJeux=deye_jeux.IdJeux
                        INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
                        INNER JOIN deye_annonce_type ON deye_annonce.Idforme = deye_annonce_type.IdA_type
                        INNER JOIN deye_photo    ON deye_annonce.IdPhoto=deye_photo.IdPhoto
                        INNER JOIN deye_age      ON deye_annonce.IdAge=deye_age.IdAge
                        INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
                        WHERE Idforme = "ND"
                        ORDER BY IdAnnonce DESC';
            $stmt = $this->pdo->query($sql);
            return $stmt;
        }
    }

    public function select_allLastDemande()
  	{
        if ($this->pdo == null){//pas de connexion
            return null;
        }else{
            $sql = 'SELECT IdAnnonce, deye_jeux.designation, deye_annonce_type.Annonce_Type, deye_personne.nom, deye_photo.url_photo,
                        deye_age.age_requis, deye_categorie.libelle, deye_annonce.Description,region,ville,postal,Etat,deye_personne.prenom,
                        deye_jeux.prix, deye_jeux.date_sortie, deye_jeux.nb_joueurs, deye_jeux.temps_jeux, deye_personne.email,Depot
                        FROM deye_annonce
                        INNER JOIN deye_jeux     ON deye_annonce.IdJeux=deye_jeux.IdJeux
                        INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
                        INNER JOIN deye_annonce_type ON deye_annonce.Idforme = deye_annonce_type.IdA_type
                        INNER JOIN deye_photo    ON deye_annonce.IdPhoto=deye_photo.IdPhoto
                        INNER JOIN deye_age      ON deye_annonce.IdAge=deye_age.IdAge
                        INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
                        WHERE Idforme = "D"
                        ORDER BY IdAnnonce DESC LIMIT 0,3';
            $stmt = $this->pdo->query($sql);
            return $stmt;
        }
    }

    public function select_userDemande($id_user)
    {
      if ($this->pdo == null){//pas de connexion
          return null;
      }else{
          $sql = 'SELECT idAnnonce, deye_jeux.designation, deye_annonce_type.Annonce_Type, deye_personne.Nom, deye_photo.url_photo, deye_age.age_requis, deye_categorie.libelle, deye_annonce.Description,region,ville,postal,Etat,Depot
                    FROM deye_annonce
                    INNER JOIN deye_jeux     ON deye_annonce.IdJeux=deye_jeux.IdJeux
                    INNER JOIN deye_personne ON deye_annonce.IdPersonne=deye_personne.IdPersonne
                    INNER JOIN deye_annonce_type ON deye_annonce.Idforme = deye_annonce_type.IdA_type
                    INNER JOIN deye_photo    ON deye_annonce.IdPhoto=deye_photo.IdPhoto
                    INNER JOIN deye_age      ON deye_annonce.IdAge=deye_age.IdAge
                    INNER JOIN deye_categorie ON deye_annonce.IdCategorie=deye_categorie.IdCategorie
                    WHERE deye_personne.idPersonne = ? AND Idforme = "D"
                    ORDER BY IdAnnonce DESC';
          $stmt = $this->pdo->prepare($sql);
          $stmt->execute(array($id_user));
          return $stmt;
      }
    }
		
  	public function setTableDemande($uneTableDemande)
  	{
  		$this->table = $uneTableDemande;
  	}
  }
?>
