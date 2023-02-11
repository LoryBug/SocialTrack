<?php
require_once("bootstrap.php");


$templateParams["titolo"] = "Socialtrack - Mio Profilo";


if (isset($_GET["user"])) {
    $templateParams["profile"] = $_GET["user"];
} else {
    $templateParams["profile"] = $_SESSION["username"];
}

if (isset($templateParams["profile"])) {
    if (isset($_POST["follow"])) {
        $dbh->insertNewFollow($_SESSION["username"], $templateParams["profile"]);
    }

    if (isset($_POST["unfollow"])) {
        $dbh->deleteFollow($_SESSION["username"], $templateParams["profile"]);
    }

}
if (isset($_POST["unfollowlist"]) && isset($_POST["follower_username"])) {
    $dbh->deleteFollow($_SESSION["username"], $_POST["follower_username"]);

}
if (isset($_POST["followlist"]) && isset($_POST["follower_username"])) {
    $dbh->insertNewFollow($_SESSION["username"], $_POST["follower_username"]);
    // qui va inserita la notifica di follow, 
    //bisogna inserire come user della notifica $_POST["follower_username"]
    $notID = $dbh->getNotNewID()[0]["NotID"];
    $notID = $notID +1;
    $dbh->setNotificaFollow($notID, $_SESSION["username"], $_POST["follower_username"]);
}

if (isset($_POST["unfollowlist_following"]) && isset($_POST["following_username"])) {
    $dbh->deleteFollow($_SESSION["username"], $_POST["following_username"]);
}
if (isset($_POST["followlist_following"]) && isset($_POST["following_username"])) {
    $dbh->insertNewFollow($_SESSION["username"], $_POST["following_username"]);
    // qui va inserita la notifica di follow, 
    //bisogna inserire come user della notifica $_POST["follower_username"]
    $notID = $dbh->getNotNewID()[0]["NotID"];
    $notID = $notID +1;
    $dbh->setNotificaFollow($notID, $_SESSION["username"], $_POST["following_username"]);
}

//DELETE post
if (isset($_POST["deletePostButton"])) {
    //var_dump(count($dbh->getCommentPost($_POST["deletePostID"])));
    if (count($dbh->getCommentPost($_POST["deletePostID"])) != 0) {
        foreach ($dbh->getCommentPost($_POST["deletePostID"]) as $comment):
            $dbh->deleteNotifica($comment["CommentID"]);
            $dbh->deleteComment($comment["CommentID"]);
        endforeach;
    }
    $dbh->deletePost($_POST["deletePostID"]);
}
//DELETE track
if (isset($_POST["deleteTrackButton"])) {
    if (count($dbh->getReviewTrack($_POST["deleteTrackID"])) != 0) {
        //var_dump(count($dbh->getReviewTrack($_POST["deleteTrackID"])));
        foreach ($dbh->getReviewTrack($_POST["deleteTrackID"]) as $review):
           $dbh->deleteNotificaReview($review["ReviewID"]);
           $dbh->deleteReview($review["ReviewID"]);
        endforeach;
    }
    $dbh->deleteTrack($_POST["deleteTrackID"]);
}

//---------------------------------------------------------------------------------
if (isset($_GET["action"]) && $_GET["action"] == "upd") {
    $dbh->updateNotifica($_SESSION['username']);
    header("Location: myprofile.php");
}
//if sulla get del username
if (isset($_GET["user"]) && $_GET["user"] != $_SESSION['username']) {
    $templateParams["username"] = $_GET["user"];
    $templateParams["imgProfile"] = $dbh->getUserImg($_GET["user"])[0]["ProfileImg"];
    $templateParams["email"] = $dbh->getUserEmail($_GET["user"])[0]["Email"];
    $templateParams["listaTrack"] = "lista-user-track.php";
    $templateParams["listaPost"] = "lista-user-post.php";
    $templateParams["followers"] = "lista-follower.php";
    $templateParams["following"] = "lista-following.php";
    $templateParams["notifiche"] = "lista-notifiche.php";
    $templateParams["user_following"] = $dbh->getUserFollowing($templateParams["username"]);
    $templateParams["user_follower"] = $dbh->getUserFollowers($templateParams["username"]);
    $templateParams["session_following"] = $dbh->getUserFollowing($_SESSION['username']);
    $templateParams["session_follower"] = $dbh->getUserFollowers($_SESSION['username']);
} elseif (isset($_GET["username"]) && $_GET["username"] == $_SESSION['username']) {

    $templateParams["username"] = $_SESSION['username'];
    $templateParams["imgProfile"] = $dbh->getUserImg($_SESSION['username'])[0]["ProfileImg"];
    $templateParams["email"] = $dbh->getUserEmail($_SESSION['username'])[0]["Email"];
    $templateParams["listaTrack"] = "lista-user-track.php";
    $templateParams["listaPost"] = "lista-user-post.php";
    $templateParams["followers"] = "lista-follower.php";
    $templateParams["following"] = "lista-following.php";
    $templateParams["notifiche"] = "lista-notifiche.php";
    $templateParams["user_following"] = $dbh->getUserFollowing($_SESSION['username']);
    $templateParams["user_follower"] = $dbh->getUserFollowers($_SESSION['username']);
    $templateParams["session_following"] = $dbh->getUserFollowing($_SESSION['username']);
    $templateParams["session_follower"] = $dbh->getUserFollowers($_SESSION['username']);
} else {
    $templateParams["username"] = $_SESSION['username'];
    $templateParams["imgProfile"] = $dbh->getUserImg($_SESSION['username'])[0]["ProfileImg"];
    $templateParams["email"] = $dbh->getUserEmail($_SESSION['username'])[0]["Email"];
    $templateParams["listaTrack"] = "lista-user-track.php";
    $templateParams["listaPost"] = "lista-user-post.php";
    $templateParams["followers"] = "lista-follower.php";
    $templateParams["following"] = "lista-following.php";
    $templateParams["notifiche"] = "lista-notifiche.php";
    $templateParams["user_following"] = $dbh->getUserFollowing($_SESSION['username']);
    $templateParams["user_follower"] = $dbh->getUserFollowers($_SESSION['username']);
    $templateParams["session_following"] = $dbh->getUserFollowing($_SESSION['username']);
    $templateParams["session_follower"] = $dbh->getUserFollowers($_SESSION['username']);

}
require("template/base-myprofile.php");
?>