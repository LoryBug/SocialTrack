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

if(isUserLoggedIn()){
    header('Location: ./index.php');
}
// richiamo la query di insert nuovo utente con le variabili di sessione prese dal form di registrazione


$templateParams["titolo"] = "Socialtrack - Login";

require("template/base-login.php");

?>
