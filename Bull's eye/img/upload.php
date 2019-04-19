
<?php
  $dossier = "img/";
  $fichier = $dossier . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageType = strtolower(pathinfo($fichier,PATHINFO_EXTENSION));
  // Vérification si une image ou non
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "Le fichier est une image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "Le fichier n'est pas une image.";
          $uploadOk = 0;
      }
  }
  // Vérification existence fichier
  if (file_exists($fichier)) {
      echo "Fichier déjà existant";
      $uploadOk = 0;
  }
  // Vérification taille fichier
  if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Fichier trop grand";
      $uploadOk = 0;
  }
  // Permissions Fichier format
  if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg"
  && $imageType != "gif" ) {
      echo "Seulement les fichiers jpg, png, et jpeg sont autorisés.";
      $uploadOk = 0;
  }
  // Vérification d'$uploadOk par erreur
  if ($uploadOk == 0) {
      echo "Désolé, votre fichier n'a pas été uploader";
  // Sinon, essayer d'upload
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fichier)) {
          echo "Le transfert de ". basename( $_FILES["fileToUpload"]["name"]). " a été un succès.";
      } else {
          echo "Désolé, il y a eu une erreur.";
      }
  }
?>
