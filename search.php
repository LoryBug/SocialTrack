<?php
require_once("bootstrap.php");
$templateParams["titolo"] = "Socialtrack - search";


$templateParams["lista"] = "lista-All-user.php";

if (isset($_POST["followlist"])) {
    //var_dump( $_POST["follower_username"]);
    $dbh->insertNewFollow($_SESSION["username"],$_POST["follower_username"]);
    $notID = $dbh->getNotNewID()[0]["NotID"];
    $notID = $notID +1;
    $dbh->setNotificaFollow($notID, $_SESSION["username"],$_POST["follower_username"]);
}

if (isset($_POST["unfollowlist"])) {
    $dbh->deleteFollow($_SESSION["username"], $_POST["follower_username"]);
}

$templateParams["session_following"] = $dbh->getUserFollowing($_SESSION['username']);



require("template/base-search.php");
?>