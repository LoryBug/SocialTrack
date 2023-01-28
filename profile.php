<?php
require_once("bootstrap.php");


$templateParams["titolo"] = "Socialtrack - Profilo";
$templateParams["username"] = $_SESSION['username'];
$templateParams["imgProfile"] = $dbh->getUserImg($_SESSION['username'])[0]["ProfileImg"];

require("template/base-profile.php");
?>