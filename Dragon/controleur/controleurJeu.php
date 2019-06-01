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
    }
?>
 