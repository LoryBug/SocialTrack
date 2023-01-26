<?php
require_once("bootstrap.php");

if(isset($_POST["textAreaPost"])){
    //var_dump($_POST["textAreaPost"]);
    $nPostID = $dbh->getPostNewID()[0]["COUNT(PostID)+1"];
    $datetimePost = date("Y/m/d H:i:s");
    $dbh->insertNewPost("$nPostID", "$datetimePost", "$_POST[textAreaPost]", "upload/$_POST[ImgInput]", "GiammaC");
}

$templateParams["titolo"] = "Socialtrack - Home";
$templateParams["nome"] = "lista-post.php";

require("template/base.php");
?>