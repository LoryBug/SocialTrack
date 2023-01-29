<?php
require_once("bootstrap.php");

if (isset($_POST["textAreaTrack"])) {
    //$_POST["textAreaTrack"];
    $nTrackID = $dbh->getTrackNewID()[0]["COUNT(TrackID)+1"];
    $datetimeTrack = date("Y/m/d H:i:s");
    $dbh->insertNewTrack("$nTrackID", "$_POST[textAreaTrack]", "$_POST[typeTrack]",
    "$datetimeTrack","$_POST[lengthTrack]", "$_POST[RegionTrack]","upload/$_POST[GPXInput]","upload/$_POST[ImgInput]", $_SESSION["username"]);
}
if (isset($_POST["reviewInput"])) {
    //var_dump($_POST["TrackInput"]);
    $nReviewID = $dbh->getReviewNewID()[0]["COUNT(ReviewID)+1"];
    $datetimeReview = date("Y/m/d H:i:s");
    $dbh->insertNewReview("$nReviewID", "$_POST[reviewInput]", "$datetimeReview","$_POST[trackVote]", "$_POST[trackID]", "GiammaC");
}


$templateParams["titolo"] = "Socialtrack - track";
$templateParams["inserimento"] = "inserisci-track.php";
$templateParams["lista"] = "lista-track.php";
$templateParams["imgProfile"] = $dbh->getUserImg($_SESSION['username'])[0]["ProfileImg"];

$templateParams["nFollowers"] = $dbh->getNFollowers($_SESSION['username'])[0]["nFollower"];
$templateParams["nFollowing"] = $dbh->getNFollowing($_SESSION['username'])[0]["nFollow"];

$templateParams["nTracks"] = $dbh->getNTrack($_SESSION['username'])[0]["COUNT(TrackID)"];

require("template/base.php");
?>