<?php
session_start();
echo($_POST["age"]."<br>") ;;
echo($_POST["categorie"]."<br>") ;;
echo($_POST["jeu"]."<br>") ;;
echo($_POST["description"]."<br>") ;;




try {
    // à prendre de l'objet $_SESSION
    // $idPersonne = $_SESSION['personne_connectee']
    $idJeu = $_POST["jeu"];
    $idPersonne =  $_SESSION['IdPersonne'];
   // $idPersonne = 1;

    // les information venues du client
    $age = $_POST["age"];
    $categorie = $_POST["categorie"];
    $description = $_POST["description"];

    /*    $typedoc = $_POST['typedoc'];
    // On enregistre ensuite dans la BDD   
   $fileName = $_FILES['monfichiersol']['name'];
    $tmpName = $_FILES['monfichiersol']['tmp_name'];
    $fileSize = $_FILES['monfichiersol']['size'];
    $fileType = $_FILES['monfichiersol']['type'];

  $fp = fopen($tmpName, 'r');
      $content = fread($fp, filesize($tmpName));
      $content = addslashes($content);

      //$idproprietaire = 3;
      $monfichiersol = $content;
      $nommonfichiersol = $fileName;
      fclose($fp); */

    $attributFichier = "monfichiersol";
    $idfichier=uniqid();
    $valeurschamps = array();
    include ("connect.php");



    // local
    if (DEBUG>3) {
        echo "fileName = $fileName<br>";
        echo "tmpName = $tmpName<br>";
        echo "fileSize = $fileSize <br>";
        echo "fileType = $fileType <br>";
        //  echo "monfichiersol=$monfichiersol<br>";
     } 
     
    foreach ($_FILES as $key => $file) {
        if(DEBUG>2){
            echo("key = $key");
        }
        if ($file['error'] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES[$key]["tmp_name"];
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = $idfichier . "-". basename($_FILES[$key]["name"]) ;
            //array_push($valeurschamps, $name);
            $nouveauFichier = CHEMIN_DOCUMENTS.$name;

            chmod(CHEMIN_DOCUMENTS,0777);
            $moveok = move_uploaded_file($tmp_name, $nouveauFichier);
            //$moveok = copy($tmp_name, $nouveauFichier);
            if(DEBUG>2){
                echo "move is ok!";
                echo "file perms = " . substr(decoct(fileperms($tmp_name)), -3)."<br>"; // 777
                echo "file size = " . filesize($tmp_name)."<br>";
                echo "chemin = depart = $tmpName, arrivée = " . $nouveauFichier."<br>";         
                echo "move ok = $moveok<br>";
            }
        }
    }
    $idPhoto = $name;

    $ligneValeurChamps = "'".implode("','", $valeurschamps)."'";
    
    
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO deye_annonce (IdJeux,IdPersonne,IdAge,IdCategorie,Description, PhotoAnnoncePerso)
                     VALUES ('$idJeu','$idPersonne','$age','$categorie', '$description', '$idPhoto')";
    
    //$sql = "INSERT INTO doe (idproprietaire,px,py,nommonfichierarchitecte,nommonfichiercoffrage,nommonfichierarmature,statut)
    //             VALUES ('$idproprietaire','$px','$py','$nommonfichierarchitecte','$nommonfichiercoffrage','$nommonfichierarmature','en attente')";
    
    // use exec() because no results are returned
    $pdo->exec($sql);

} 
catch (PDOException $e) {
    echo "Erreur lors du dépot : <br>" . $e->getMessage();
}
$pdo = null;
header("Location: depot_annonce_ok.php");


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

