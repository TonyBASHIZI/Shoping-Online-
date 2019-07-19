<?php
session_start();
    include 'include/config.php';
    if (isset($_GET) && isset($_GET["idArticle"]) && isset($_GET["qteCmd"]) && $_SESSION["id_user"]>0)
    {
        $id_user=trim(htmlentities($_SESSION["id_user"]));
        $id_Article=trim(htmlentities($_GET["idArticle"]));
        $qte=trim(htmlentities($_GET["qteCmd"]));
        if (!empty($qte) && $qte>0)
        {
            $sql = "insert into tPanier(id_user, id_Article, qteCmd) values('$id_user', '$id_Article', '$qte')";
            if (mysqli_query($con, $sql)) {
                $successMessage = "Enregistrement reussi";
                echo '<p>Article ajouté au panier</p>';
                header("location:articles.php");
            }
            else {
                echo '<p>Erreur survenue</p>';
                header("location:articles.php");
            }
        }
        else
        {
            echo '<p>Error occured <br> Quantite invalide</p>';
        }

    }
    else
    {
        echo '<p>Erreur survenue</p>';
        header("location:articles.php");
    }
?>