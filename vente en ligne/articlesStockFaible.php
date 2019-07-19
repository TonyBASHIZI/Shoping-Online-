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
            
            <h2 id="block-header" style="text-align: left;">Articles avec stock faible</h2><br>
            
            
            <div class="row">
                <table class="table table-striped table-bordered">
                    <thead> 
                        <tr> 
                            <th>Nom</th> 
                            <th>Details</th> 
                            <th>Fabrication</th>
                            <th>Couleur</th>
                            <th>Poids</th>
                            <th>Prix</th>
                            <th>Fournisseur</th> 
                            <th>Stock</th> 
                        </tr> 
                    </thead>
                    <br>
                    <tbody>

                        <?php
                        include 'include/config.php';
                        // $result=mysqli_query($con, "select * from tArticle");
                        $result=mysqli_query($con, "select nomArticle, detailArticle, anneeFabrication, couleurArticle, poidsArticle, prixUnitArticle, fournisseurArticle, quantiteStock  from tArticle where quantiteStock<10");
                        while ($row=mysqli_fetch_array($result))
                        {
                            ?>

                                <tr style="background:rgba(0, 255, 0, 0.1);">
                                    <td><?php echo $row["nomArticle"];?></td>
                                    <td><?php echo $row["detailArticle"];?></td>
                                    <td><?php echo $row["anneeFabrication"];?></td>
                                    <td><?php echo $row["couleurArticle"];?></td>
                                    <td><?php echo $row["poidsArticle"];?></td>
                                    <td><?php echo $row["prixUnitArticle"];?></td>
                                    <td><?php echo $row["fournisseurArticle"];?></td>
                                    <td><?php echo $row["quantiteStock"];?></td>

                                </tr> 

                            <?php
                            
                            }
                            ?>

                    </tbody>

                </table>
                
            </div><br><br><br>



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