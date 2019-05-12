<!-- The Modal -->
<div id="id01" class="modal">

<!-- Modal Content -->
<form action="/action_page.php">
<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <div class="img-container">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          <img src="img/logo.png" class="logo_modal">
          </div>
          <div class="col-xs-12 d-flex flex-row">
            <button id="eyeConnexion" class="btn btn-lg btn-primary btn-block col-xs-6 col-md-6" onclick="show(id)" >Se connecter</button>
            <button id="eyeInscription" class="btn btn-lg btn-primary btn-block col-xs-6 col-md-6 mt-0" onclick="show(id)" >S'inscrire</button>
          </div>

          <!-- formulaire de connexion -->
          <form method="POST" class="form-signin">
            <div id="eyeFormConnexion">
              <h5 class="card-title text-center">Se connecter</h5>
              <div class="form-label-group">
                <label for="inputEmail">Email</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
              </div>
              <div class="form-label-group">
                <label for="inputPassword">Mot de passe</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
              </div>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Me retenir</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="formconnexion" type="submit">Go !</button>

            </div>
          </form>


          <!-- formulaire d'inscription -->

          <?php

          
          $bdd= new PDO ('mysql:host=127.0.0.1;dbname=dragoneye', 'root', '');
          if(isset($_POST['forminscription'])){

            echo "oooook";

          }


        
          ?>

            <form method="POST" class="form-signup">
            <div id="eyeFormInscription">

              <h5 class="card-title text-center">S'inscrire</h5>
              <div class="form-label-group">
                <label for="inputPseudo">Pseudo</label>
                <input type="Pseudo" id="pseudo" class="form-control" name="pseudo" placeholder="Pseudo">
              </div>
              <div class="form-label-group">
                <label for="inputEmail">Email</label>
                <input type="email" id="mail" class="form-control" name="mail" placeholder="Email">
              </div>
              <div class="form-label-group">
                <label for="inputEmail">Confirmer l'email</label>
                <input type="email" id="mail2" class="form-control" name="mail2" placeholder="Email">
              </div>
              <div class="form-label-group">
                <label for="inputEmail">Mot de passe</label>
                <input type="password" id="mdp" class="form-control" name="mdp" placeholder="Mot de passe">
              </div>
              <div class="form-label-group">
                <label for="inputEmail">Confirmer mot de passe</label>
                <input type="password" id="mdp2" class="form-control" name="mdp2" placeholder="Confirmer mot de passe">
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="forminscription" type="submit">Go !</button>
            </div>

          </form>
          <?php if(isset($erreur)){
            echo '<font color="red">'.$erreur."</font>";
          }
          ?>

        </div>
      </div>
    </div>
  </div>
</div>
</form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
 if (event.target == modal) {
     modal.style.display = "none";
 }
}

function show(id){
console.log(id);
if(id == "eyeInscription"){
  document.getElementById("eyeFormConnexion").style.display = "none";
  display = document.getElementById("eyeFormInscription").style.display = "block";
  console.log(display);
}else if(id == "eyeConnexion"){
  console.log("hello");
  document.getElementById("eyeFormConnexion").style.display = "block";
  document.getElementById("eyeFormInscription").style.display = "none";
}

}
</script>
</li>
</ul>
</div>