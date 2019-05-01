<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Dragon'Eye's - Espace admin</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/admin_style.css" rel="stylesheet">
</head>

<body>
  <?php include('../include/header.php') ?>
  
  <!--Bouton de gestion utilisateurs, annonces, jeux, évènements-->
  <div class="container-fluid padding">
  <div class="row text-center">
              
              <div class="container">
              <div class="row">

                <div class="col-sm-3">
                      <a href="manage/manageUser.php" class="btn btn-secondary">Gestion des utilisateurs</a>
                </div>

                <div class="col-sm-3">
                      <a href="manage/manageAdd.php" class="btn btn-secondary">Gestion des annonces</a>
                </div>

                <div class="col-sm-3">
                      <a href="manage/manageGame.php" class="btn btn-secondary">Gestion des jeux</a>
                </div>

                <div class="col-sm-3">
                      <a href="manage/manageEvent.php" class="btn btn-secondary">Gestion des évènements</a>
                </div>



              </div>
              </div>


              
  </div>
  </div>
  <?php include('../include/footer.php') ?>
</body>
</html>