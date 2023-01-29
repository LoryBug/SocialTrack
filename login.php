<?php
require_once("bootstrap.php");

if(isset($_POST["username"]) && isset($_POST["password"])){
    
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

// richiamo la query di insert nuovo utente con le variabili di sessione prese dal form di registrazione
//if per controlloo se utente esiste o meno su attrivuto username

if(isset($_POST["reg_username"])){
    //insert e check se esistono nel db
    $defaultImgPath = "upload\login-default.jpg";
    $dbh->insertNewUser($_POST["reg_username"], $_POST["reg_password"], $_POST["reg_email"]);
    $login_result = $dbh->checkLogin($_POST["reg_username"], $_POST["reg_password"]);

    registerLoggedUser($login_result[0]);
}

if(isUserLoggedIn()){
    header('Location: ./index.php');
}

$templateParams["titolo"] = "Socialtrack - Login";

require("template/base-login.php");

?>
