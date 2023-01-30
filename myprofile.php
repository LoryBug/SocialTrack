<?php
require_once("bootstrap.php");


$templateParams["titolo"] = "Socialtrack - Mio Profilo";
/*$templateParams["username"] = $_GET["username"];
$templateParams["imgProfile"] = $dbh->getUserImg($_SESSION['username'])[0]["ProfileImg"];
$templateParams["email"] = $dbh->getUserEmail($_SESSION['username'])[0]["Email"];
$templateParams["listaTrack"] = "lista-user-track.php";
$templateParams["listaPost"] = "lista-user-post.php";
$templateParams["followers"] = "lista-follower.php";
$templateParams["following"] = "lista-following.php";
$templateParams["notifiche"] = "lista-notifiche.php";
*/

if (isset($_GET["user"])) {
    $templateParams["profile"] = $_GET["user"];
}else{
    $templateParams["profile"] = $_SESSION["username"];
}


if (isset($_GET["action"]) && $_GET["action"] == "upd") {
    $dbh->updateNotifica($_SESSION['username']);
    header("Location: myprofile.php");
}
//if sulla get del username
if (isset($_GET["user"]) && $_GET["user"] != $_SESSION['username']) {
    $templateParams["username"] = $_GET["user"];
    $templateParams["imgProfile"] = $dbh->getUserImg($_GET["user"])[0]["ProfileImg"];
    $templateParams["email"] = $dbh->getUserEmail($_GET["user"])[0]["Email"];
    $templateParams["listaTrack"] = "lista-user-track.php";
    $templateParams["listaPost"] = "lista-user-post.php";
    $templateParams["followers"] = "lista-follower.php";
    $templateParams["following"] = "lista-following.php";
    $templateParams["notifiche"] = "lista-notifiche.php";
} elseif (isset($_GET["username"]) && $_GET["username"] == $_SESSION['username']) {

    $templateParams["username"] = $_SESSION['username'];
    $templateParams["imgProfile"] = $dbh->getUserImg($_SESSION['username'])[0]["ProfileImg"];
    $templateParams["email"] = $dbh->getUserEmail($_SESSION['username'])[0]["Email"];
    $templateParams["listaTrack"] = "lista-user-track.php";
    $templateParams["listaPost"] = "lista-user-post.php";
    $templateParams["followers"] = "lista-follower.php";
    $templateParams["following"] = "lista-following.php";
    $templateParams["notifiche"] = "lista-notifiche.php";
} else {
    $templateParams["username"] = $_SESSION['username'];
    $templateParams["imgProfile"] = $dbh->getUserImg($_SESSION['username'])[0]["ProfileImg"];
    $templateParams["email"] = $dbh->getUserEmail($_SESSION['username'])[0]["Email"];
    $templateParams["listaTrack"] = "lista-user-track.php";
    $templateParams["listaPost"] = "lista-user-post.php";
    $templateParams["followers"] = "lista-follower.php";
    $templateParams["following"] = "lista-following.php";
    $templateParams["notifiche"] = "lista-notifiche.php";

}
$templateParams["user_following"]= $dbh->getUserFollowing($_SESSION['username']);

require("template/base-myprofile.php");
?>