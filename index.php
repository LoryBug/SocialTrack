<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Socialtrack - Home";
$templateParams["username"] = $dbh->getUser("GiammaC")[0]["Username"];
$templateParams["ProfileImg"] = $dbh->getUser("GiammaC")[0]["ProfileImg"];
require("template/base.php");

?>