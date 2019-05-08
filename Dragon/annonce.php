<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- title -->
        <title>Poster une annonce</title>
        <link href="./css/style.css" rel="stylesheet">
        <link href="./css/index_style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/annonce.css">

        <!-- bootstrap css -->
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <!--script src="js/code.js"></script-->




        <!-- font awesome -->
        <!--link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!-- google fonts -->
        <!--link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700" rel="stylesheet"-->
    </head>
    <body>
        <?php 
        $deposerAnnonce = true;
        include("include/header.php");
        ?>




        <section id="contact">
            <div class="contact-cover">
                <div class="contact-inner">
                    <h1>Déposer une annonce</h1>
                    <form method = "post" id="annonceform" action = "gererPosterAnnonce.php" enctype="multipart/form-data" autocomplete="off">

                        <div class="form-group">
                            <label class="form-control-label"><i class="fa fa-bookmark"></i> Titre</label>
                            <!--input name="titre" type="title" required placeholder="Titre de l'annonce" class="form-control"-->
                            <select name="jeu" id="jeu" class="form-control jeux" form="annonceform">
                                <?php
                                include ("connect.php");
                                $query = "SELECT  IdJeux, designation FROM deye_jeux";

                                $stmt1 = $pdo->prepare($query);
                                $stmt1->execute();
                                $count = 0;

                                // pour chaque document
                                while ($result1 = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                                    $count = $count + 1;
                                    $id = $result1[0];
                                    $libelle = $result1[1];
                                    echo "<option value=$id>$libelle</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Image générique du jeu-->
                        <div id="img-jeu">

                        </div>

                        <!-- Image personnnelle du meme jeu-->
                        <!--<div class="form-group">

                            <label for="exampleInputFile"><i class="fas fa-images"></i>Ajouter une image</label>
                            <input name="image1" type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">

                        </div>-->

                        <div class="form-group">
                            <label class="form-control-label"><i class="fa fa-gamepad"></i> CATEGORIE</label>
                            <select name="categorie" id="country" class="form-control" form="annonceform">
                                <!--option value="Action">ACTION</option>
                                <option value="Strategie">STRATEGIE</option>
                                <option value="Fps">FPS</option>
                                <option value="Rpg">RPG</option>
                                <option value="Course">COURSE</option-->

                                <?php
                                include ("connect.php");
                                $query = "SELECT  IdCategorie, libelle FROM deye_categorie";
                                $data = array();
                                $stmt1 = $pdo->prepare($query);
                                $stmt1->execute();
                                $count = 0;

                                // pour chaque document
                                while ($result1 = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                                    $count = $count + 1;
                                    $id = $result1[0];
                                    $libelle = $result1[1];
                                    echo "<option value=$id>$libelle</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label"><i class="fa fa-bookmark"></i> Age</label>
                            <!--input name="age" type="text" required placeholder="" class="form-control"-->
                            <select name="age" id="age" class="form-control" form="annonceform">
                                <!--option value="Action">ACTION</option>
                                <option value="Strategie">STRATEGIE</option>
                                <option value="Fps">FPS</option>
                                <option value="Rpg">RPG</option>
                                <option value="Course">COURSE</option-->

                                <?php
                                include ("connect.php");
                                $query = "SELECT  IdAge, age_requis FROM deye_age";

                                $stmt1 = $pdo->prepare($query);
                                $stmt1->execute();
                                $count = 0;

                                // pour chaque document
                                while ($result1 = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                                    $count = $count + 1;
                                    $id = $result1[0];
                                    $libelle = $result1[1];
                                    echo "<option value=$id>$libelle</option>";
                                }
                                ?>
                            </select>

                        </div>







                        <div class="form-group">
                            <label class="form-control-label"><i class="fa fa-envelope-open"></i> Description de l'annonce</label>
                            <textarea name="description" class="form-control"required cols="3" rows="6" placeholder="Description"></textarea>
                        </div>
<!-- Image personnnelle du meme jeu-->
                        <div class="form-group">

                            <label for="exampleInputFile"><i class="fas fa-images"></i>Ajouter une image</label>
                            <input name="image1" type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">

                        </div>

                        <input class="btn " type="submit" value="Poster l'annnonce">
                        <!--div class="form-group" align="center">
                            <button class="btn "><a href="#" target="_blank">Poster l'annnonce</a></button>
                        </div-->
                    </form>
                </div>
            </div>
        </section>
    </div>
            
            <br>
            <br>
    <?php include('./include/footer.php') ?>


    <script>
        $(".jeux").change(function () {
            $jeu = $("#jeu");
            var idJeu = $jeu.val();
            //alert(idJeu);
            $.ajax({
                method: "POST",
                url: "obtenirUrlImage.php?idJeu=" + idJeu,
            })
            .done(function (url) {
                url = url.substring(3);
                local = '<?=_DIR_?>/';
                //alert(url);
                $("#img-jeu").empty();
                $('<img class="image-jeu" src="'+local+url+'">').appendTo("#img-jeu");
                //alert( "Handler for .change() called." );
            });
        });
    </script>
</body>
</html>