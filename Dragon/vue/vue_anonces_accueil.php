<?php
    if(isset($resultats) && $resultats!=null){
      echo "<table>";
      var_dump($resultats);
      var_dump($resultats->fetch());

        while ($unRes = $resultats->fetch())
        {
            echo '<div class="col-sm-4">
            <div class="card">
              <div class="img-jeu">
              <img src="'.$unRes['url'].'" class="thumbnail" alt="article">
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
          </div>';
        }

        echo "</table>";
    }
?>