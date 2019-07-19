<?php
    include "include/config.php";
    if (isset($_POST["submit"]))
    {
        $username=trim(htmlentities($_POST["username"]));
        $pwd=trim(htmlentities($_POST["pwd"]));
        $phone=trim(htmlentities($_POST["phone"]));
        $retype=trim(htmlentities($_POST["retypePwd"]));
        $adresse=trim(htmlentities($_POST["adresse"]));
        if ($pwd==$retype)
        {
            $fetch_user=$con->query("select * from tuser where nomUser='$username'") or die($con->error());
            if ($fetch_user->num_rows>0)
            {
                echo '<script>alert("Username deja utilise");</script>';
            }
            else
            {
                $query="insert into tuser(nomUser, pwdUser, numTel,adresse) values ('$username', '$pwd', '$phone','$adresse')";
                if ($con->query($query))
                {
                    echo '<script>alert("Compte cree avec succes! Connectez-vous");</script>';
                    header("location:index.php");
                }
            }
        }
        else
        {
            echo '<script>alert("Les mots de passe ne correspondent pas!");</script>';
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

    <body background="img/back/back.jpg">
    <!-------------------------------Header--------------------------->
        <div class="container-fluid" >
            <div class="container" id="">
                <h1 style="color: #45c8dc; margin: 0 auto; text-shadow: 0px 3px 3px black">Go Market</h1>

                <div class="row"><br>
                    <div class="col-md-4 center-block" id="divLogin">
                        <img src="img/back/logicon.png" alt="login-icon" id="logIcon">
                        <h2 style="text-align: center; width: 100%">Register</h2>
                        <p style="text-align: center">Creer un compte gratuit maintenant</p><br>
                        <form action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">
                            <input style="height: 40px" name="username" type="text" class="form-control" placeholder="Votre nom d'utilisateur" required><br>
                            <input style="height: 40px" name="phone" type="tel" class="form-control" placeholder="Votre N° Téléphone" required><br>
                            <input style="height: 40px" name="adresse" type="text" class="form-control" placeholder="Votre adresse physique" required><br>
                            <input style="height: 40px" name="pwd" type="password" class="form-control" placeholder="Votre mot de passe" required><br>
                            <input style="height: 40px" name="retypePwd" type="password" class="form-control" placeholder="Retapez le mot de passe" required><br>
                            <input type="submit" name="submit" style="width: 120px" class="btn btn-info center-block" value="Sign up">
                        </form>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span style="color:black; font-size: 14px; border-radius: 5px; padding: 10px; clear: both; display: inline-block; bottom: 0px; position: fixed; width: %; text-align: center;">
                            <p>Vous avez un compte?</p>
                            <a style="color: ; font-size: 18px; font-weight: bold" href="index.php">Se connecter</a>
                        </span>
                    </div>

                </div>
            </div>
        </div>

    


    </body>
</html>