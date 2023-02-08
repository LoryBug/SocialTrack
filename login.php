<?php
require_once("bootstrap.php");

if(isset($_POST["username"]) && isset($_POST["password"])){
    
    //mi ricalcolo hash se corrisponde entro
    $utente = $dbh->getUser($_POST["username"]);
    $password = hash('sha512', $_POST["password"].$utente[0]["Salt"]);
    $login_result = $dbh->checkLogin($_POST["username"], $password);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

// richiamo la query di insert nuovo utente con le variabili di sessione prese dal form di registrazione
//if per controllo se utente esiste o meno su attrivuto username

if(isset($_POST["reg_username"])){
    // Crea una chiave casuale
    $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
    // Crea una password usando la chiave appena creata.
    $password = hash('sha512', $_POST["reg_password"].$random_salt);
    //insert e check se esistono nel db
    $defaultImgPath = "upload\login-default.jpg";
    $dbh->insertNewUser($_POST["reg_username"], $password, $random_salt, $_POST["reg_email"]);
    $login_result = $dbh->checkLogin($_POST["reg_username"], $password);

    registerLoggedUser($login_result[0]);
}

if(isUserLoggedIn()){
    header('Location: ./index.php');
}

$templateParams["titolo"] = "Socialtrack - Login";

require("template/base-login.php");

?>
