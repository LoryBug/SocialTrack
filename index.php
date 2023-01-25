<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Socialtrack - Home";

//prova get post dal DB
$templateParams["postcasuali"] = $dbh->getRandomPosts(2);

require("template/base.php");

?>