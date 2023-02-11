<?php
require_once("bootstrap.php");

//insert new post
if (isset($_POST["textAreaPost"])) {
    $nPostID = $dbh->getPostNewID()[0]["PostID"];
    $nPostID = $nPostID + 1;
    //var_dump($nPostID);
    $datetimePost = date("Y/m/d H:i:s");
    $dbh->insertNewPost("$nPostID", "$datetimePost", "$_POST[textAreaPost]", "upload/$_POST[ImgInput]", $_SESSION["username"]);
}
if (isset($_POST["CommentInput"])) {
    //  var_dump($notID);
    $nCommentID = $dbh->getCommentNewID()[0]["CommentID"];
    $nCommentID = $nCommentID + 1; 

    $notID = $dbh->getNotNewID()[0]["NotID"];
    $notID = $notID +1;
    $datetimeComment = date("Y/m/d H:i:s");
    $dbh->insertNewComment("$nCommentID", "$_POST[CommentInput]", "$datetimeComment", "$_POST[postID]", $_SESSION["username"]);
    $dbh->setNotificaComment($notID, $nCommentID, $_POST["userPost"]);
}

if (isset($_GET["username"]) && $_GET["username"] != $_SESSION["username"]) {
    $dbh->updateNotifica($_SESSION['username']);
    header("Location: myprofile.php");
}

$templateParams["titolo"] = "Socialtrack - Home";
$templateParams["inserimento"] = "inserisci-post.php";

//ORDER BY filter
$orderBy = "Più recente";
if (isset($_POST["date"])) {
    $orderBy = $_POST["date"];
}
if ($orderBy == "Più recente") {

    $templateParams["lista"] = "lista-post.php";
} else {
    $templateParams["lista"] = "lista-older-post.php";
}

$templateParams["filterBar"] = "filter-bar-post.php";
$templateParams["imgProfile"] = $dbh->getUserImg($_SESSION['username'])[0]["ProfileImg"];
$templateParams["nFollowers"] = $dbh->getNFollowers($_SESSION['username'])[0]["total"];
$templateParams["nFollowing"] = $dbh->getNFollowing($_SESSION['username'])[0]["total"];
$templateParams["nTracks"] = $dbh->getNTrack($_SESSION['username'])[0]["COUNT(TrackID)"];


$templateParams["notificNotSeen"] = $dbh->getNotificNotSeen($_SESSION['username'])[0]["notificCount"];

require("template/base.php");
?>