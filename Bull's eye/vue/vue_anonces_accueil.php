<?php
    if(isset($resultats) && $resultats!=null){

        echo "<table border = 1>
        <tr> <td> Photo </td><td> Annonce </td> <td> Jeux </td><td> Qui? </td><td> Age </td><td> Categorie </td><td> Description </td></tr> ";

        foreach ($resultats as $unRes)
        {
            echo '<div class="col-sm-4">
            <div class="card">
              <div class="img-jeu">
              <img src="img/trone.jpg" class="thumbnail" alt="article">
              </div>
              <hr>
              <div class="card-body">
                <h4 class="card-title">Nom du jeu</h4>
                <p class="card-text"><i class="fas fa-gamepad"></i> Type de jeu</p>
                <p class="card-text"><i class="fas fa-map-marker-alt"></i> Lieu</p>
                <p class="card-text"><i class="fas fa-users"></i> Age</p>
                <a href="#" class="btn btn-outline-secondary">Voir plus</a>
              </div>
            </div>
          </div>';
        }

        echo "</table>";
    }
?>