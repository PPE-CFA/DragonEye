<?php
  include(_DIR2_."/modele/UserModele.php");
    class ControleurUser
    {
      private $unUserModele;

      public function __construct ($serveur, $bdd,$user,$mdp)
      {
        //instanciation de la classe modele
        $this->unUserModele = new UserModele ($serveur, $bdd, $user, $mdp);
      }

      public function setTableUser($uneTableUser)
      {
        $this->unUserModele->setTableUser($uneTableUser);
      }

      function select_User($id_user)
      {
        $resultats=$this->unUserModele->select_User($id_user);
        return $resultats;
      }

      function select_allMembre()
      {
        $stmt=$this->unUserModele->select_allMembre();
        return $stmt;
      }

      function select_Membre()
      {
        $stmt=$this->unUserModele->select_Membre();
        return $stmt;
      }

      function connectUser($mailconnect, $mdpconnect)
      {
        $result=$this->unUserModele->connectUser($mailconnect, $mdpconnect);
        return $result;
      }

      function updateUser($value, $champ, $id_user)
      {
        $result=$this->unUserModele->updateUser($value, $champ, $id_user);
        return $result;
      }

      function existUser($mailconnect, $mdpconnect)
      {
        $result=$this->unUserModele->existUser($mailconnect, $mdpconnect);
        return $result;
      }
    }
?>
