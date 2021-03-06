<?php
  include(_DIR2_."/modele/EventModele.php");
    class ControleurEvent
    {
      private $unEventModele;

      public function __construct ($serveur, $bdd,$user,$mdp)
      {
        //instanciation de la classe modele
        $this->unEventModele = new EventModele ($serveur, $bdd, $user, $mdp);
      }

      public function setTableEvent($uneTableEvent)
      {
        $this->unEventModele->setTablEvent($uneTableEvent);
      }

      function select_allEvent()
      {
        $stmt=$this->unEventModele->select_allEvent();
        return $stmt;
      }

      function select_Event($id_event)
      {
        $result=$this->unEventModele->select_Event($id_event);
        return $result;
      }

      function updateEvent($value, $champ, $id_event, $action)
      {
        $this->unEventModele->updateEvent($value, $champ, $id_event, $action);
      }

      function addEvent($array_value_event)
      {
        $this->unEventModele->addEvent($array_value_event);
      }

      function existEvent($nomEvent)
      {
        $result=$this->unEventModele->existEvent($nomEvent);
        return $result;
      }

    }
?>
