<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$idJeu = $_GET["idJeu"];

include ("connect.php");
try {
    $query = "SELECT `deye_jeux`.IdJeux, `deye_jeux`.IdPhoto, `deye_photo`.IdPhoto, url_photo \n"
            . "FROM `deye_jeux`,`deye_photo` \n"
            . "WHERE `deye_jeux`.IdJeux = $idJeu "
            . "AND`deye_photo`.IdPhoto = `deye_jeux`.IdPhoto LIMIT 0, 30 ";

    $data = array();
    $stmt1 = $pdo->prepare($query);
    $stmt1->execute();
    $count = 0;

// pour chaque document
    while ($result1 = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $count = $count + 1;
        $url = $result1[3];
        echo $url;
    }
} catch (PDOException $e) {
    echo "Erreur lors du dépot : <br>" . $e->getMessage();
}

