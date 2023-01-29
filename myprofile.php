<?php
require_once("bootstrap.php");


$templateParams["titolo"] = "Socialtrack - Mio Profilo";
$templateParams["username"] = $_SESSION['username'];
$templateParams["imgProfile"] = $dbh->getUserImg($_SESSION['username'])[0]["ProfileImg"];
$templateParams["email"] = $dbh->getUserEmail($_SESSION['username'])[0]["Email"];

$templateParams["listaTrack"] = "lista-user-track.php";
$templateParams["listaPost"] = "lista-user-post.php";
$templateParams["followers"] = "lista-follower.php";
$templateParams["following"] = "lista-following.php";
$templateParams["notifiche"] = "lista-notifiche.php";




require("template/base-myprofile.php");
?>