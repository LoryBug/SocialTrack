<?php
require_once("bootstrap.php");


$templateParams["titolo"] = "Socialtrack - Profilo";
// prendo username del profilo da visualizzare
if(isset($_GET["username"])){
    $templateParams["username"] = $_GET["username"];
}
$templateParams["imgProfile"] = $dbh->getUserImg($_GET['username'])[0]["ProfileImg"];
$templateParams["email"] = $dbh->getUserEmail($_GET['username'])[0]["Email"];

$templateParams["listaTrack"] = "lista-user-track.php";
$templateParams["listaPost"] = "lista-user-post.php";
$templateParams["followers"] = "lista-follower.php";
$templateParams["following"] = "lista-following.php";
$templateParams["notifiche"] = "lista-notifiche.php";




require("template/base-userProfile.php");
?>