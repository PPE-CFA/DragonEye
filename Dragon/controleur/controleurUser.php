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
    }
?>
