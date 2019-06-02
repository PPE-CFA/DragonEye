<?php
  class JeuModele
  {
    private $pdo, $table;

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->pdo = null;
        try{
            $this->pdo = new PDO ("mysql:hostname=".$serveur.";dbname=".$bdd,$user,$mdp);
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

    public function select_Jeu($id_jeu)
    {
        if ($this->pdo == null){//pas de connexion
            return null;
        }else{
            $sql = 'SELECT IdJeux, designation, date_sortie, prix, temps_jeux, nb_joueurs, deye_editeur.Nom, deye_age.age_requis
                        FROM deye_jeux
                        INNER JOIN deye_editeur  ON deye_jeux.IdEditeur = deye_editeur.IdEditeur
                        INNER JOIN deye_age      ON deye_jeux.IdAge = deye_age.IdAge
                        WHERE IdJeux = '.$id_jeu.'';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }
    }

    public function updateJeu($value, $champ, $id_jeu, $action)
    {
        if ($this->pdo == null){//pas de connexion
            return null;
        }else{
            if($action === 'edit'){
                $sql = 'UPDATE deye_jeux SET '.$champ.' = ? WHERE IdJeux = '.$id_jeu.'';
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(array($value));
            }else if($action === 'supprime'){
                $sql = 'DELETE FROM deye_jeux WHERE IdJeux = '.$id_jeu.'';
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }
        }
    }

    public function addJeu($array_value_jeu)
    {
        if ($this->pdo == null){//pas de connexion
            return null;
        }else{
            $sql = 'INSERT INTO deye_jeux(designation,date_sortie,prix,temps_jeux,nb_joueurs,IdPersonne,IdEditeur,IdAge,IdCategorie,IdPhoto)
                        VALUES(?,?,?,?,?,?,?,?,?,?)';
            var_dump($sql);
            var_dump($array_value_jeu);
            exit();
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($array_value_jeu);
        }
    }

    public function existJeu($nomJeu)
    {
        if ($this->pdo == null){//pas de connexion
            return null;
        }else{
            $sql = 'SELECT * FROM deye_jeux WHERE designation = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array($nomJeu));
            $result = $stmt->rowCount();
            return $result;
        }
    }
    
  	public function setTableJeu($uneTableJeu)
  	{
  		$this->table = $uneTableJeu;
  	}
  }
?>
