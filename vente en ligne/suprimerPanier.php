<?php
session_start();
    include 'include/config.php';
    if (isset($_GET) && isset($_GET["id_panier"]))
    {
        $id_panier=trim(htmlentities($_GET["id_panier"]));
        $sql = "delete from tPanier where id_panier='$id_panier'";
        if (mysqli_query($con, $sql)) {
            $successMessage = "Enregistrement reussi";
            echo '<p>Article supprimé du panier</p>';
            header("location:viewPanier.php");
        }
        else {
            echo '<p>Erreur survenue</p>';
            header("location:viewPanier.php");
        }
    }
    else
    {
        echo '<p>Erreur survenue, donnees non recues</p>';
        header("location:viewPanier.php");
    }
?>