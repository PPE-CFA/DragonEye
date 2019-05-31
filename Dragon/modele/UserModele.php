<?php
  class UserModele
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

  	public function select_User($id_user)
  	{
        if ($this->pdo == null){//pas de connexion
            return null;
        }else{
            $requete = "SELECT * FROM deye_personne WHERE IdPersonne = ?";
            $stmt = $this->pdo->prepare($requete);
            $stmt->execute(array($id_user));
            $result = $stmt->fetch();
            return $result;
        }
    }

    public function connectUser($mailconnect, $mdpconnect)
    {
      if ($this->pdo == null){//pas de connexion
          return null;
      }else{
        $sql = 'SELECT * FROM deye_personne WHERE email = ? AND mdp = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($mailconnect, $mdpconnect));
        $result = $stmt->fetch();
        return $result;
      }
    }

    public function existUser($mailconnect, $mdpconnect)
    {
      if ($this->pdo == null){//pas de connexion
          return null;
      }else{
        $sql = 'SELECT * FROM deye_personne WHERE email = ? AND mdp = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($mailconnect, $mdpconnect));
        $result = $stmt->rowCount();
        return $result;
      }
    }
		
  	public function setTableUser($uneTableUser)
  	{
  		$this->table = $uneTableUser;
  	}
  }
?>
