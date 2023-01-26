<?php
require_once("bootstrap.php");

if(isset($_POST["textAreaPost"])){
    //var_dump($_POST["textAreaPost"]);
    $nPostID = $dbh->getPostNewID()[0]["COUNT(PostID)+1"];
    $datetimePost = date("Y/m/d H:i:s");
    $dbh->insertNewPost("$nPostID", "$datetimePost", "$_POST[textAreaPost]", "upload/$_POST[ImgInput]", "GiammaC");
}
if(isset($_POST["CommentInput"])){
    //var_dump($_POST["CommentInput"]);
    $nCommentID = $dbh->getCommentNewID()[0]["COUNT(CommentID)+1"];
    $datetimeComment = date("Y/m/d H:i:s");
    $dbh->insertNewComment("$nCommentID", "$_POST[CommentInput]", "$datetimeComment", "$_POST[postID]", "GiammaC");
}

$templateParams["titolo"] = "Socialtrack - Home";
$templateParams["nome"] = "lista-post.php";

//test
//$dbh->insertNewComment("c3", "prova insert comment", "2023-01-26 20:55:22", "2", "LoryBart");

require("template/base.php");
?>