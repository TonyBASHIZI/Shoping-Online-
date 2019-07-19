<?php
    if (!isset($_SESSION))
    {
        session_start();
    }
?>
    <!-------------------------------Header--------------------------->

    <div class="row" >
        <div class="col-md-4" >
            <h1>ALLIMENTATION DE LA CHARITE</h1>
        </div>
        <div class="col-md-8">

            <nav class="menu pull-right" >
                <ul>
<!--                    <li><a href="index.php">Accueil</a></li>-->
                    <a href="viewPanier.php?id_user= {$_SESSION['id_user']}"><li>Panier</li></a>
                    <a href="articles.php"><li>Articles</li></a>
                    <a href="achat.php"><li>Achats</li></a>
<!--                    <li><a href="">Accueil</a></li>-->

                </ul>
            </nav>

        </div>

    </div>

        <!--<div class="col-md-3" id="social">
            <div>
                Facebook  |  Whatsapp  |  Twitter
            </div>
        </div>-->

    <div class="row" >
        <div class="col-md-10"></div>
        <div class="col-md-2" style="float: right">
            Connecté : <strong> "
            <?php
                if (isset($_SESSION["username"]) && !empty($_SESSION["username"]))
                {
                    echo strtoupper($_SESSION["username"]);
                }
                else{
                    echo '<script> alert("Error occured");</script>';
                    header("location:index.php");
                }
            ?> </strong>"
        </div>

    </div>
    <div class="row">
        <div class="col-md-2 pull-right" style="float: ">
            <span style="float: ; text-align: right;"><a href="logout.php" style="color: #eee;">Log out</a></span>
        </div>
    </div>


