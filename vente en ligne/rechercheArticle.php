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
<!--            <a href="articles.php">Liste des articles</a>  |-->

            <h2 id="block-header" style="text-align: left;">Articles</h2><br>
            <div class="row">
                <?php
                    include 'include/config.php';
                    if (isset($_POST) && isset($_POST["rechercherBtn"]))
                    {
                        $rechercheVal=trim(htmlentities($_POST["champs_recherche"]));
                        echo "<span style='font-size: 16px'>Résultats pour <strong>'" .$rechercheVal."'</strong></span> <br><br> ";
                        $result=mysqli_query($con, "select * from tArticle where nomArticle like '%$rechercheVal%' or detailArticle like '%$rechercheVal%'");
                        while ($row=mysqli_fetch_array($result))
                        {
                            ?>
                            <a href="viewArticle.php?idArticle=<?php echo $row["id_article"];?>" style="color: white">
                                <div class="col-md-3" id="itemArticle">
                                    <div class="">

                                        <h3><?php echo $row["nomArticle"];?></h3>
                                        <img src="img/<?php echo $row["img_article"]; ?>" alt="" id="img" class="img-responsive">
                                        <p style="margin-left: 0px; text-align: left"><?php echo $row["detailArticle"] . '  |  ' . $row["anneeFabrication"]; ?> <br>$ <?php echo $row["prixUnitArticle"];  ?>  |  Qty: <em><?php echo $row["quantiteStock"];  ?></em>
                                            <a href="insertPanier.php?idArticle=<?php echo $row["id_article"];?>" class="" style="color: green; background: #fff; padding: 2px; border-radius: 5px; float: right; text-decoration: none">Ajouter au panier</a></p>
                                    </div>
                                </div>

                            </a>
                            <?php
                        }
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