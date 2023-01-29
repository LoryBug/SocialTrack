<?php
require_once("bootstrap.php");

if (isset($_POST["textAreaPost"])) {
    //var_dump($_POST["textAreaPost"]);
    $nPostID = $dbh->getPostNewID()[0]["COUNT(PostID)+1"];
    $datetimePost = date("Y/m/d H:i:s");
    $dbh->insertNewPost("$nPostID", "$datetimePost", "$_POST[textAreaPost]", "upload/$_POST[ImgInput]", $_SESSION["username"]);
}
if (isset($_POST["CommentInput"])) {
    //var_dump($_POST["CommentInput"]);
    $nCommentID = $dbh->getCommentNewID()[0]["COUNT(CommentID)+1"];
    $datetimeComment = date("Y/m/d H:i:s");
    $dbh->insertNewComment("$nCommentID", "$_POST[CommentInput]", "$datetimeComment", "$_POST[postID]",$_SESSION["username"]);
}

$templateParams["titolo"] = "Socialtrack - Home";
$templateParams["inserimento"] = "inserisci-post.php";

//scelta ORDER BY filter
$orderBy="Più recente";
if(isset($_POST["date"]))
{
    $orderBy=$_POST["date"];
}
if($orderBy == "Più recente"){

    $templateParams["lista"] = "lista-post.php";
}
else{
    $templateParams["lista"] = "lista-older-post.php";
}

$templateParams["imgProfile"] = $dbh->getUserImg($_SESSION['username'])[0]["ProfileImg"];
$templateParams["nFollowers"] = $dbh->getNFollowers($_SESSION['username'])[0]["nFollower"];
$templateParams["nFollowing"] = $dbh->getNFollowing($_SESSION['username'])[0]["nFollow"];
$templateParams["nTracks"] = $dbh->getNTrack($_SESSION['username'])[0]["COUNT(TrackID)"];

require("template/base.php");
?>