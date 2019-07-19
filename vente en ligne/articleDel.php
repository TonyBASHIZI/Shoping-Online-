<?php
session_start();

    if ($_SESSION["username"]=="admin")
    {
        include 'include/config.php';
        if (isset($_GET) && isset($_GET["idArticle"]))
        {
            $id_Article=trim(htmlentities($_GET["idArticle"]));
            $sql = "delete from tArticle where id_article= '$id_Article'";
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
            echo '<p>Erreur survenue</p>';
            header("location:articles.php");
        }
    }
    else
    {
        header("location:articles.php");
        echo '<script> alert("Seul l\'admin execute ces actions")</script>';
    }

?>