<?php
  if(isset($resultats_demandes) && $resultats_demandes!=null && $resultats_demandes->rowCount() > 0){
    echo "<table>";
    //var_dump($resultats_demandes);
    //var_dump($resultats_demandes->fetch());

      while ($unRes = $resultats_demandes->fetch())
      {
          echo '<div class="col-sm-4">
          <div class="card">
            <div class="img-jeu">
            <img src="'._DIR_.$unRes['url_photo'].'" class="thumbnail" alt="article">
            </div>
            <hr>
            <div class="card-body">
              <h4 class="card-title">'.$unRes['designation'].'</h4>
              <p class="card-text"><i class="fas fa-gamepad"></i> Type de jeu</p>
              <p class="card-text"><i class="fas fa-map-marker-alt"></i> Lieu</p>
              <p class="card-text"><i class="fas fa-users"></i> '.$unRes['age_requis'].'</p>
              <a href="#" class="btn btn-outline-secondary">Voir plus</a>
            </div>
          </div>
        </div>
          
        <!-- Modal -->
        <div id="myModal'.$unRes["IdAnnonce"].'" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><img src="../../img/logo.png"> Offre - '.$unRes["designation"].'</h4>
                <h6 class="modal-subtitle">'.$unRes["region"].', '.$unRes["ville"].', '.$unRes["postal"].'</h6>
                
              </div>
              
              <!--Modal Body-->
              <div class="modal-body">
                
                <div class="img-ad">
                  <img  class="w-100" src="../img/nature3.jpg"/>
                  <!--popover
                  <a href="#" title="Fiche de '.$unRes["designation"].'" data-toggle="popover" data-trigger="focus" data-img="'.$unRes["url_photo"].'" ></a>-->
                  
                  '.$unRes["designation"].'
                </div>


                <div class="description-ad">

                  <h5>Categorie</h5>
                  '.$unRes["libelle"].'
                  <h5>Age</h5>
                  '.$unRes["age_requis"].'
                  <h5>Etat du jeu </h5> 
                  '.$unRes["Etat"].'
                  <h5>Description </h5>
                  <p>'.$unRes["Description"].'</p>
                  <h5>De '.$unRes["nom"].' '.$unRes["prenom"].'</h5>
                  Posté le : ...

                
                </div>
                
              </div>

            

              <!--Modal Footer-->
              <!--Affiche les coordonnées si l\'utilisatepage de connection/inscription-->
              <div class="modal-footer">';
              if(isset($_SESSION['IdPersonne'])){
                echo '<button type="button" class="btn btn-outline-secondary">'.$unRes["email"].' </button>';
              }else{
                echo '<a href="./connexion/inscription.php" class="btn btn-secondary"><i class="fas fa-id-card"></i> Obtenir les coordonnées</a>';
              }
        echo '</div>
            </div>
          </div>
        </div>';
      }

      echo "</table>";
  }else{
    echo '<div class="col-12 alert alert-danger">Il n\'y a pas de demande disponible.</div>';
  }