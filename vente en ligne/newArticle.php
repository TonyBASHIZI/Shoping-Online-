<?php
session_start();


$message="";
$successMessage="";

    include "include/config.php";
    if (isset($_POST['inserer'])){
        if (isset($_FILES['photo']) AND $_FILES['photo']['error']== 0) {
            if ($_FILES['photo']['size'] <= 1000000) {
                $infosfichier = pathinfo($_FILES['photo']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

                $target="img/";
//                $target=$target . basename($_FILES["photo"]["name"]);
                $rand=md5(uniqid().rand());
                $imgName=$rand .".". $extension_upload;

                if (in_array($extension_upload, $extensions_autorisees)) {
                    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target.$imgName))
                    {
                        //Inserting data in database
                        $nomArticle = trim(htmlentities($_POST["nomArticle"]));
                        $detailArticle = trim(htmlentities($_POST["detailArticle"]));
                        $anneeFabric = trim(htmlentities($_POST["anneeFabric"]));
                        $couleurArticle = trim(htmlentities($_POST["couleurArticle"]));
                        $poidsArticle = trim(htmlentities($_POST["poidsArticle"]));
                        $prixUnitaire = trim(htmlentities($_POST["prixUnitaire"]));
                        $fournisseur = trim(htmlentities($_POST["fournisseur"]));
                        $sql = "insert into tArticle(nomArticle, detailArticle, anneeFabrication, couleurArticle, poidsArticle, prixUnitArticle, img_article, fournisseurArticle) values('$nomArticle', '$detailArticle', '$anneeFabric', '$couleurArticle', '$poidsArticle', '$prixUnitaire', '$imgName', '$fournisseur')";
                        if (mysqli_query($con, $sql)) {
                            $successMessage = "Enregistrement reussi";
//                        echo $successMessage;
                        }
                        else {
                            $message = "Error occured while inserting data";
                        }
                    }
                    else {
                        $message = "Error occured while uploading file";
                    }


                }
                else{
                    $message="Choisissez une image au format valide";
                }
            }
            else{
                $message= "Taille de l'image non supporte";
            }
        }
        else{
            $message= "Fichier non envoyer";
        }

//
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <meta charset="utf-8">
    </head>

    <body>
    <!-------------------------------Header--------------------------->
        <div class="container-fluid" id="header">
            <?php
                include ("include/header.php");
            ?>

        </div>

    <!-------------------------------Main content------------------------>
        <div class="container" id="container">
            <h2 id="block-header" style="text-align: left;">Ajouter un article</h2> <br><br>
            <form action="newArticle.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="row">
                    <div class="col-md-4">
                        Nom de l'article
                        <input type="text" class="form-control" name="nomArticle" placeholder="Nom de l'article" required>
                    </div>
                    <div class="col-md-4">
                        Details de l'article
                        <input type="text" class="form-control" name="detailArticle" placeholder="Details sur l'article" required>
                    </div>
                    <div class="col-md-4">
                        Annee de fabrication
                        <input type="text" class="form-control" name="anneeFabric" placeholder="Annee de fabrication" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Couleur
                        <input type="text" class="form-control" name="couleurArticle" placeholder="Couleur" required>
                    </div>
                    <div class="col-md-4">
                        Poids
                        <input type="text" class="form-control" placeholder="Poids" name="poidsArticle" required>
                    </div>

                    <div class="col-md-4">
                        Prix
                        <input type="text" class="form-control" placeholder="Prix unitaire" name="prixUnitaire" required>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Fournisseur
                        <input type="text" class="form-control" placeholder="Fournisseur" name="fournisseur" required>
                    </div>

                </div>
                <br>
                Image de l'article <br><br>
                <input type="file" name="photo" accept="image/gif, image/jpeg , image/jpg, image/png" required>
                <div class="row">
                    <input type="submit" name="inserer" class="btn btn-info pull-right" value="Ajouter l'article">
                </div>
            </form>
            <br><br>
            <div id="returnMessage" style="color: red; background: rgba(255, 0, 0, 0.1)">
                <?php echo $message;?>
            </div>
            <div id="returnMessage" style="color: green; background: rgba(0, 255, 0, 0.1)">
                <?php echo $successMessage;?>
            </div>

        </div>

    <!--------------------------------Footer----------------------------->

    <br>
    <!--<div class="container-fluid" id="footer">
        <?php
/*            include ("include/footer.php");
        */?>
    </div>-->


    </body>
</html>