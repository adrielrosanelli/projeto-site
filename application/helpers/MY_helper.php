<?php
function isLoged($url){
 if(!$_SESSION["logado"]){
     ob_start();
     session_start();
     $_SESSION['ultimaUrl']=$url;
    header("Location:http://localhost/projeto-site/projeto-site/login");
    exit();
 }
}