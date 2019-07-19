<?php
session_start();
include "include/config.php";
if (isset($_POST["submit"]))
{
    $username=trim(htmlentities($_POST["username"]));
    $pwd=trim(htmlentities($_POST["pwd"]));
        $fetch_user=$con->query("select * from tuser where nomUser='$username' and pwdUser='$pwd'") or die($con->error());
        if ($fetch_user->num_rows>0)
        {
            $row=mysqli_fetch_array($fetch_user);
            $_SESSION["username"]=$username;
            $_SESSION["id_user"]=$row["id_user"];
            $_SESSION["numTel"]=$row["numTel"];
            $_SESSION["adresse"]=$row["adresse"];
//            echo '<script>alert("Utilisateur trouve");</script>';
            header("location:articles.php");
            
        }
        else
        {
            echo '<script>alert("Username ou mot de passe incorrecte");</script>';
//            header("location:index.php");
        }

}

?>



<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <meta charset="utf-8">
    </head>

    <body background="img/back/back.JPG">
    <!-------------------------------Header--------------------------->
        <div class="container-fluid" >
            <div class="container" id="">
                <h1 style="color: #45c8dc; margin: 0 auto; text-shadow: 0px 3px 3px black">ALLIMENTATION DE LA CHARITE</h1>

                <div class="row"><br><br>
                    <div class="col-md-4 center-block" id="divLogin">
                        <img src="img/back/logicon.png" alt="login-icon" id="logIcon"><br><br><br>
                     <p style="text-align: center">Enter your credentials to log in</p><br>
                        <form action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
                            <input style="height: 50px" name="username" type="text" class="form-control" placeholder="Username" required><br><br>
                            <input style="height: 50px" name="pwd" type="password" class="form-control" placeholder="Password" required><br><br>
                            <input type="submit" name="submit" style="width: 120px" class="btn btn-info center-block" value="Login">
                        </form>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span style="color:black; font-size: 14px; border-radius: 5px; padding: 10px; clear: both; display: inline-block; bottom: 0px; position: fixed; width: %; text-align: left;">
                            <p>Pas de compte?</p>
                            <a style="color: ; font-size: 20px; font-weight: bold" href="register.php">Creer un compte</a>
                        </span>
                    </div>

                </div>
            </div>
        </div>

    


    </body>
</html>