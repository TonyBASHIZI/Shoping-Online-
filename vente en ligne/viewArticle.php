<?php
    session_start();
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
            <h2 id="block-header" style="text-align: left;">Consulter l'article</h2> <br>
            <div class="row">

                <?php
                include 'include/config.php';

                if (isset($_GET["idArticle"]))
                {
                    $id_article=trim(htmlentities($_GET["idArticle"]));
                }
                $result=mysqli_query($con, "select * from tArticle where id_article='$id_article'");
                while ($row=mysqli_fetch_array($result))
                {
                    ?>

                        <div class="col-md-3" id="">
                            <h3 style="color: #000; background: rgb(244, 244, 244); padding: 10px; border-radius: 5px;"><?php echo $row["nomArticle"];?></h3>
                            <img style="float: left" src="img/<?php echo $row["img_article"]; ?>" alt="" id="img" class="img-responsive">
                        </div>
                        <div style="float: left; font-size: 16px; margin-left: 20px; margin-top: 20px">
                            <p style="text-decoration:underline;padding: 10px; border-radius: 5px;">Detail du produit :</p>
                            <p>Detail : <em><?php echo $row["detailArticle"];?></em></p>
                            <p>Annee de fabication : <em><?php echo $row["anneeFabrication"]; ?></em></p>
                            <p style="font-size: 25px; font-style: italic; font-weight: bold; color: orangered">Prix : <em>$<?php echo $row["prixUnitArticle"];  ?></em></p>
                            <p>Couleur : <em><?php echo $row["couleurArticle"];  ?></em></p>
                            <p>Poids : <em><?php echo $row["poidsArticle"];  ?> kg</em></p>
                            <p>Stock disponible : <em><?php echo $row["quantiteStock"];  ?></em></p>
                            <p>Propriétaire : <em><?php echo $row["fournisseurArticle"];  ?></em></p>
                        </div>

                    <?php
                    if ($_SESSION["username"]=="admin") {
                        ?>
                        <a href="articleDel.php?idArticle=<?php echo $row["id_article"]; ?>" class="btn btn-danger" style="clear: both; margin: 20px; width: 140px">Supprimer</a>
                        <a href="approvisionnerArticle.php?idArticle=<?php echo $row["id_article"]; ?>" class="btn btn-info" style="clear: both; margin: 20px; width: 140px">Approvisionner</a>
<!--                        <a href="#" class="btn btn-success" style="clear: both; margin: 20px; width: 140px">Modifier</a>-->
                        <?php
                    }
                    ?>




                    <?php
                }
                ?>


            </div>



        </div>

    <!--------------------------------Footer----------------------------->

    <br>
    <div class="container-fluid" id="footer">
        <?php
            include ("include/footer.php");
        ?>
    </div>


    </body>
</html>