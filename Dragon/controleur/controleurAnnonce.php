<?php
  include(_DIR2_."/modele/AnnonceModele.php");
  class ControleurAnnonce
  {
    private $unModeleAnnonce;

  public function __construct ($serveur, $bdd,$user,$mdp)
  {
    //instanciation de la classe modele
    $this->unModeleAnnonce = new AnnonceModele ($serveur, $bdd, $user, $mdp);
  }

  public function setTableAnnonce($uneTableAnnonce)
  {
    $this->unModeleAnnonce->setTableAnnonce($uneTableAnnonce);
  }

  function select_Annonce()
  {
    $resultats=$this->unModeleAnnonce->select_Annonce();
    return $resultats;
  }

  function select_Annonce_recent()
  {
    $resultats=$this->unModeleAnnonce->select_Annonce_recent();
    return $resultats;
  }

  function select_Demandes()
  {
    $resultats=$this->unModeleAnnonce->select_Demandes();
    return $resultats;
  }

  function select_allAd()
  {
    $stmt=$this->unModeleAnnonce->select_allAd();
    return $stmt;
  }

  function updateAd($value, $champ, $id_annonce, $action)
  {
    $result=$this->unModeleAnnonce->updateAd($value, $champ, $id_annonce, $action);
    return $result;
  }

  function addAnnonce($array_value_annonce)
  {
    $this->unModeleAnnonce->addAnnonce($array_value_annonce);
  }

}
?>
