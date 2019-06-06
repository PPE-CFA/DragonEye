<?php
  include(_DIR2_."/modele/OffreModele.php");
    class ControleurOffre
    {
      private $unOffreModele;

      public function __construct ($serveur, $bdd,$user,$mdp)
      {
        //instanciation de la classe modele
        $this->unOffreModele = new OffreModele ($serveur, $bdd, $user, $mdp);
      }

      public function setTableOffre($uneTableOffre)
      {
        $this->unOffreModele->setTableOffre($uneTableOffre);
      }

      function select_allOffre()
      {
        $stmt=$this->unOffreModele->select_allOffre();
        return $stmt;
      }

      function select_allNewOffre()
      {
        $stmt=$this->unOffreModele->select_allNewOffre();
        return $stmt;
      }

      function select_allLastOffre()
      {
        $stmt=$this->unOffreModele->select_allLastOffre();
        return $stmt;
      }

      function select_userOffre($id_user)
      {
        $stmt=$this->unOffreModele->select_userOffre($id_user);
        return $stmt;
      }
    }
?>
