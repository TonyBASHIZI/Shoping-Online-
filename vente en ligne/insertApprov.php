<?php
session_start();
include "include/config.php";
if (isset($_POST["approv"]))
{
    $qteApprov=trim(htmlentities($_POST["qteApprov"]));
    $id_article=trim(htmlentities($_POST["id_article"]));
    $newQuantite=trim(htmlentities($_POST["qteStock"]));
    $dateApprov=date("Y-M-d");
    $newQuantite+=$qteApprov;
    if ($qteApprov>0)
    {
        $sql = "update tArticle set quantiteStock='$newQuantite' where id_Article='$id_article'";
        $sql2="insert into tApprovisionnement (id_article, quantiteApprov, dateApprov) values('$id_article', '$qteApprov', '$dateApprov')";
        $sql_all=$sql.";".$sql2;
        if (mysqli_multi_query($con, $sql_all)) {
            $successMessage = "Enregistrement reussi";
            echo '<p>Article ajouté au panier</p>';
            header("location:articles.php");
        }
        else {
            echo '<p>Erreur survenue</p>';
            header("location:approvisionnerArticle.php");
        }
    }
    else
    {
        echo '<script>alert("Quantite invalide");</script>';
        echo '<span style="font-size: 70px;font-weight:bold; ">Error 404</span> <br></span> <a href="articles.php">Retour</a>';
    }
}
else
{
    echo '<script>alert("Erreur, donnees non recues");</script>';
}
?>