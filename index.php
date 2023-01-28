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
$templateParams["lista"] = "lista-post.php";
$templateParams["imgProfile"] = $dbh->getUserImg($_SESSION['username'])[0]["ProfileImg"];

require("template/base.php");
?>