<?php
require_once("bootstrap.php");

if (isset($_POST["textAreaPost"])) {
    //var_dump($_POST["textAreaPost"]);
    $nPostID = $dbh->getPostNewID()[0]["COUNT(PostID)+1"];
    $datetimePost = date("Y/m/d H:i:s");
    $dbh->insertNewPost("$nPostID", "$datetimePost", "$_POST[textAreaPost]", "upload/$_POST[ImgInput]", "GiammaC");
}
if (isset($_POST["CommentInput"])) {
    //var_dump($_POST["CommentInput"]);
    $nCommentID = $dbh->getCommentNewID()[0]["COUNT(CommentID)+1"];
    $datetimeComment = date("Y/m/d H:i:s");
    $dbh->insertNewComment("$nCommentID", "$_POST[CommentInput]", "$datetimeComment", "$_POST[postID]", "GiammaC");
}

$templateParams["titolo"] = "Socialtrack - Home";
//$templateParams["opzione"] = "inserisci-post.php";
//$templateParams["lista"] = "lista-post.php";

//-------------------------------------------------------test track page
$templateParams["opzione"] = "inserisci-track.php";
$templateParams["lista"] = "lista-track.php";

require("template/base.php");
?>