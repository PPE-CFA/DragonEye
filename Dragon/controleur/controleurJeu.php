<?php
    include(_DIR2_."/modele/JeuModele.php");
    class ControleurJeu
    {
        private $unModeleJeu;

        public function __construct ($serveur, $bdd,$user,$mdp)
        {
            //instanciation de la classe modele
            $this->unModeleJeu = new JeuModele ($serveur, $bdd, $user, $mdp);
        }
        public function setTable($uneTableJeu)
        {
            $this->unModeleJeu->setTableJeu($uneTableJeu);
        }

        function select_allJeu()
        {
            $stmt=$this->unModeleJeu->select_allJeu();
            return $stmt;
        }

        function select_Jeu($id_jeu)
        {
            $result=$this->unModeleJeu->select_Jeu($id_jeu);
            return $result;
        }

        function updateJeu($value, $champ, $id_jeu, $action)
        {
            $this->unModeleJeu->updateJeu($value, $champ, $id_jeu, $action);
        }

        function addJeu($array_value_jeu)
        {
            $this->unModeleJeu->addJeu($array_value_jeu);
        }

        function existJeu($nomJeu)
        {
            $result=$this->unModeleJeu-> existJeu($nomJeu);
            return $result;
        }
    }
?>
 