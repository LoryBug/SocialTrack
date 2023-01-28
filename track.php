<?php
require_once("bootstrap.php");

if (isset($_POST["textAreaTrack"])) {
    //$_POST["textAreaTrack"];
    $nTrackID = $dbh->getTrackNewID()[0]["COUNT(TrackID)+1"];
    $datetimeTrack = date("Y/m/d H:i:s");
    $dbh->insertNewTrack("$nTrackID", "$_POST[textAreaTrack]", "$_POST[typeTrack]",
    "$datetimeTrack","$_POST[lengthTrack]", "$_POST[RegionTrack]","upload/...","upload/$_POST[ImgInput]", "GiammaC");
}
if (isset($_POST["reviewInput"])) {
    //var_dump($_POST["TrackInput"]);
    $nReviewID = $dbh->getReviewNewID()[0]["COUNT(ReviewID)+1"];
    //var_dump($_POST["reviewInput"]);
    $datetimeReview = date("Y/m/d H:i:s");
    $dbh->insertNewReview("$nReviewID", "$_POST[reviewInput]", "$datetimeReview","3", "$_POST[trackID]", "GiammaC");
}


$templateParams["titolo"] = "Socialtrack - track";
$templateParams["inserimento"] = "inserisci-track.php";
$templateParams["lista"] = "lista-track.php";

require("template/base.php");
?>