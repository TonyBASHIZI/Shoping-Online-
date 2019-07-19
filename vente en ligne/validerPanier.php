<?php
require __DIR__ . '/Twilio/autoload.php';
use TwilioRestClient;
session_start();
    include 'include/config.php';
    if (isset($_GET) && isset($_GET["id_panier"]) && isset($_GET["id_article"]))
    {
        $id_user=trim(htmlentities($_SESSION["id_user"]));
        $id_panier=trim(htmlentities($_GET["id_panier"]));
        $id_article=trim(htmlentities($_GET["id_article"]));
        $qteCmd=trim(htmlentities($_GET["qteCmd"]));
        $num = trim(htmlentities($_SESSION["numTel"]));
        $adresse=trim(htmlentities($_SESSION["adresse"]));
        $quantiteStock=trim(htmlentities($_GET["stockDispo"]));
        $name =trim(htmlentities($_SESSION["username"]));
        if ($qteCmd<=$quantiteStock)
        {
            $sql = "update tPanier set etatCommande='Valider' where id_panier='$id_panier'";
            $sql2="insert into tachat (id_user, id_article, qteAchat) values('$id_user', '$id_article', '$qteCmd')";
            $sql_all=$sql .";" .$sql2;
            if (mysqli_multi_query($con, $sql_all)) {
                $successMessage = "Enregistrement reussi";
                echo '<p>Article ajouté au panier</p>';
                header("location:viewPanier.php");
    //             include ( "src/NexmoMessage.php" );
    // $nexmo_sms = new NexmoMessage('d932915b', '2miNaSrdsLFOEenA');
    // $info = $nexmo_sms->sendText($num, 'GO MARKET', 'Bonjour client '.$name.',code :'.$id_panier.', Livraison a'.$adresse);
    // $info1 = $nexmo_sms->sendText('+243997269825','Bonjour Admin','client '.$name.'a reservé un produit');
    // // Step 3: Display an overview of the message
    // echo $nexmo_sms->displayOverview($info1);
    // Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACe04b9da61ee21753e644aa24f94069e6';
$auth_token = '76f008ec9a2fce958c9bb34ed1725f64';
// In production, these should be environment variables. E.g.:
//$auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+15017122661";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+243973697114',
    array(
        'from' => $twilio_number,
        'body' => 'I sent this message in under 10 minutes!'
    )
);
            }
            else {
                echo '<p>Erreur survenue</p>';
                header("location:viewPanier.php");
            }
        }
        else
        {
            echo '<script>alert("Quantite commander superieur a la quantite en stock")</script>';
            echo '<span style="font-size: 70px;font-weight:bold; ">Error 404</span> <br></span> <a href="viewPanier.php">Retour</a>';
        }
    }
    else
    {
        echo '<p>Erreur survenue, donnees non recues</p>';
        header("location:viewPanier.php");
    }
?>