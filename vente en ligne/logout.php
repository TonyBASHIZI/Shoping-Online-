<?php
session_start();
                if (isset($_SESSION["username"]) && !empty($_SESSION["username"]))
                {
                    session_unset();
                    session_destroy();
                    header("location:index.php");
                }
                else{
//                    echo '<script> alert("Error occured");</script>';
                    header("location:index.php");
                }
?>