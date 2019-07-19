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
            <h2 id="block-header" style="text-align: left;">Mon panier</h2>
            <div class="row">

                <?php
                include 'include/config.php';

                if (isset($_GET["id_user"]))
                {
//                    $id_article=trim(htmlentities($_GET["idArticle"]));
//                    $id_user=trim(htmlentities($_GET["id_user"]));
                }
                $res=mysqli_query($con, "select tpanier.id_panier, tpanier.id_article, nomArticle, detailArticle, anneeFabrication, couleurArticle, poidsArticle, prixUnitArticle, img_article, qteCmd, etatCommande, fournisseurArticle, quantiteStock from tpanier inner join tArticle on tArticle.id_article=tpanier.id_article where tpanier.id_user='".$_SESSION["id_user"]."'");
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
                                <p>Commande : <em><?php echo $row["qteCmd"];  ?></em></p>
                                <p>Propriétaire : <em><?php echo $row["fournisseurArticle"];  ?></em></p><br>
                                <?php
                                    if ($row["etatCommande"]=="Valider") {

                                        ?>
                                        <p>Etat : <em><strong>Valider</strong></em></p>
                                        <?php
                                    }
                                    else{ ?>
                                        <a href="validerPanier.php?id_panier=<?php echo $row['id_panier'];?>&id_article=<?php echo $row['id_article'];?>&qteCmd=<?php echo $row['qteCmd'];?>&stockDispo=<?php echo $row['quantiteStock'];?>" class="btn btn-success">Valider l'achat</a>
                                        <a href="suprimerPanier.php?id_panier=<?php echo $row['id_panier'];?>" class="btn btn-danger">Supprimer</a><br><br>
                                <?php
                                    }
                                    ?>

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