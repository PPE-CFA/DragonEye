<?php
  class EventModele
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

  	public function select_allEvent()
  	{
        if ($this->pdo == null){//pas de connexion
            return null;
        }else{
            $sql = 'SELECT idEvent, designation, heure_event, date_event, deye_photo.url_photo, deye_lieu.Adresse, deye_lieu.ville, deye_lieu.Nom
                        FROM deye_evenement
                        INNER JOIN deye_photo ON deye_evenement.IdEvent=deye_photo.IdPhoto
                        INNER JOIN deye_lieu ON deye_evenement.IdEvent=deye_lieu.IdLieu
                        ORDER BY date_event ASC';
            $stmt = $this->pdo->query($sql);
            return $stmt;
        }
    }
		
  	public function setTableEvent($uneTableEvent)
  	{
  		$this->table = $uneTableEvent;
  	}
  }
?>
