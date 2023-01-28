<?php
require_once("bootstrap.php");


$templateParams["titolo"] = "Socialtrack - Profilo";
$templateParams["username"] = $_SESSION['username'];
$templateParams["imgProfile"] = $dbh->getUserImg($_SESSION['username'])[0]["ProfileImg"];
$templateParams["email"] = $dbh->getUserEmail($_SESSION['username'])[0]["Email"];

$templateParams["listaTrack"] = "lista-track.php";
$templateParams["listaPost"] = "lista-post.php";
$templateParams["followers"] = "lista-follower.php";
$templateParams["following"] = "lista-following.php";
$templateParams["notifiche"] = "lista-notifiche.php";


require("template/base-profile.php");
?>