<?php
  include(_DIR2_."/modele/DemandeModele.php");
    class ControleurDemande
    {
      private $unDemandeModele;

      public function __construct ($serveur, $bdd,$user,$mdp)
      {
        //instanciation de la classe modele
        $this->unDemandeModele = new DemandeModele ($serveur, $bdd, $user, $mdp);
      }

      public function setTableDemande($uneTableDemande)
      {
        $this->unDemandeModele->setTableDemande($uneTableDemande);
      }

      function select_allDemande()
      {
        $stmt=$this->unDemandeModele->select_allDemande();
        return $stmt;
      }

      function select_userDemande($id_user)
      {
        $stmt=$this->unDemandeModele->select_userDemande($id_user);
        return $stmt;
      }
    }
?>
