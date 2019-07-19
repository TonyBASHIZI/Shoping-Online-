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
            <?php
                if ($_SESSION["username"]=="admin") {
                    ?>
                    <a href="newArticle.php" class="btn btn-default">Ajouter un article</a>
                    <a href="articlesAchetes.php" class="btn btn-info">Articles achetés</a>
                    <a href="articlesStockFaible.php" class="btn btn-danger">Articles avec stock faible</a>

                    <br><br>
                    <?php
                }
            ?>
            <h2 id="block-header" style="text-align: left;">Articles</h2><br>
            <div class="row">
                <form action="rechercheArticle.php" method="post" enctype="multipart/form-data">
                    <div class="col-md-1 pull-right" style="margin-right: 20px">

                        <button class="btn btn-default" type="submit" name="rechercherBtn">Rechercher</button>
                    </div>
                    <div class="col-md-4 pull-right">

                        <input type="search" class="form-control" name="champs_recherche" placeholder="Rechercher un article" required>
                    </div>
                </form>
            </div>
            <br>
            <div class="row">
                <?php
                    include 'include/config.php';
                    $result=mysqli_query($con, "select * from tArticle");
                    while ($row=mysqli_fetch_array($result))
                    {
                        ?>
                        <a href="" style="color: black">
                            <div class="col-md-3" id="itemArticle">
                                <div class="">

                                    <a href="viewArticle.php?idArticle=<?php echo $row["id_article"];?>" style="color: white">
                                        <h3><?php echo $row["nomArticle"];?></h3>
                                        <img src="img/<?php echo $row["img_article"]; ?>" alt="" id="img" class="img-responsive">
                                    </a>

                                    <p style="margin-left: 0px; text-align: left"><?php echo $row["detailArticle"] . '  |  ' . $row["anneeFabrication"]; ?> <br>$ <?php echo $row["prixUnitArticle"];  ?>  |  Qté:
                                        <input type="text" name="qteCmd" id="qteCmd" value="1" style="color: #000; width:40px; border-radius: 5px; border: none;" disabled="true"></em>
                                        <a href="insertPanier.php?idArticle=<?php echo $row["id_article"];?>&qteCmd=1" class="" style="color: green; background: #fff; padding: 2px; border-radius: 5px; float: right; text-decoration: none">Ajouter au panier</a></p>
                                </div>
                            </div>

                        </a>
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