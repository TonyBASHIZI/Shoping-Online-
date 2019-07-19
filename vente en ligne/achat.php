


<?php
    //Tony
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
            <h2 id="block-header" style="text-align: left;">Mes achats</h2>
            <div class="row">

                <?php
                include 'include/config.php';

                if (isset($_GET["id_user"]))
                {
//                    $id_article=trim(htmlentities($_GET["idArticle"]));
//                    $id_user=trim(htmlentities($_GET["id_user"]));
                }
                $res=mysqli_query($con, "select tAchat.id_article, nomArticle, detailArticle, anneeFabrication, couleurArticle, poidsArticle, prixUnitArticle, img_article, quantiteStock, fournisseurArticle from tachat inner join tArticle on tArticle.id_article=tAchat.id_article where tAchat.id_user='".$_SESSION["id_user"]."'");
                while ($row=mysqli_fetch_array($res))
                {
                    ?>
                        <div class="col-md-6" style="min-height: 400px; float: left; margin-bottom: 0px;">
                            <div class="col-md-6" id="">
                                <h3 style="color: #000; text-decoration: underline; font-weight: bold; font-style: italic; padding: 10px; border-radius: 5px;"><?php echo $row["nomArticle"];?></h3>
                                <img style="float: left" src="img/<?php echo $row["img_article"]; ?>" alt="" id="img" class="img-responsive">
                            </div>
                            <div class="col-md-6" style="float: left; font-size: 16px; margin-left: 0px; margin-top: 20px">
                                <p style="text-decoration:underline;padding: 10px; border-radius: 5px;">Detail du produit :</p>
                                <p>Detail : <em><?php echo $row["detailArticle"];?></em></p>
                                <p>Annee de fabication : <em><?php echo $row["anneeFabrication"]; ?></em></p>
                                <p style="font-size: 25px; font-style: italic; font-weight: bold; color: orangered">Prix : <em>$<?php echo $row["prixUnitArticle"];  ?></em></p>
                                <p>Couleur : <em><?php echo $row["couleurArticle"];  ?></em></p>
                                <p>Poids : <em><?php echo $row["poidsArticle"];  ?> kg</em></p>
                                <p>Propriétaire : <em><?php echo $row["fournisseurArticle"];  ?></em></p>
<!--                                <p>Quantity : <em>--><?php //echo $row["quantiteStock"];  ?><!--</em></p><br>-->

                            </div>
                        </div>

                    <?php
                }
                ?>


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