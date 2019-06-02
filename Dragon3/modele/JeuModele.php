<?php
  class JeuModele
  {
    private $pdo, $table;

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->pdo = null;
        try{
            $this->pdo = new PDO ("mysql:hostname=".$serveur.";dbname=".$bdd,$user,$mdp,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        }
        catch (PDOException $exp)
        {
            var_dump($serveur, $bdd, $user, $mdp);
            echo "erreur de connexion à la base de données";
        }
    }

  	public function select_allJeu()
  	{
        if ($this->pdo == null){//pas de connexion
            return null;
        }else{
            $sql = 'SELECT idJeux, Designation, Date_sortie, Prix, Temps_jeux, Nb_joueurs, deye_personne.Nom, deye_editeur.Nom, deye_age.Age_requis, deye_categorie.idCategorie, deye_categorie.Libelle AS cateLibelle, deye_photo.Url_photo
                        FROM deye_jeux
                        INNER JOIN deye_personne ON deye_jeux.IdPersonne = deye_personne.IdPersonne
                        INNER JOIN deye_editeur  ON deye_jeux.IdEditeur = deye_editeur.IdEditeur
                        INNER JOIN deye_age      ON deye_jeux.IdAge = deye_age.IdAge
                        INNER JOIN deye_categorie ON deye_jeux.IdCategorie = deye_categorie.IdCategorie
                        INNER JOIN deye_photo    ON deye_jeux.IdPhoto = deye_photo.IdPhoto
                        ORDER BY IdJeux DESC';
            $stmt = $this->pdo->query($sql);
            return $stmt;
        }
    }
		
  	public function setTableJeu($uneTableJeu)
  	{
  		$this->table = $uneTableJeu;
  	}
  }
?>
