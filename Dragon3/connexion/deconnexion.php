<?php

    //deconnecte un utilisateur

    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: inscription.php");

?>