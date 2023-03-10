<?php

class DatabaseHelper
{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connesione fallita al db");
        }
    }

    // ------------------------------------ POST --------------------------------------------
    public function getLatestPosts($username)
    {
        $stmt = $this->db->prepare("SELECT DISTINCT p.PostID, p.Post_timestamp, p.Post_text, p.Post_image, p.Username, u.ProfileImg, f.FOL_Username
        FROM user as u, post as p, follow as f WHERE f.FOL_Username = p.Username AND f.Username = ?
         ORDER BY Post_timestamp DESC");
        $stmt->bind_param("s", $username); 
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOlderPosts($username)
    {
        $stmt = $this->db->prepare("SELECT DISTINCT p.PostID, p.Post_timestamp, p.Post_text, p.Post_image, p.Username, u.ProfileImg, f.FOL_Username
        FROM user as u, post as p, follow as f WHERE f.FOL_Username = p.Username AND f.Username = ?
         ORDER BY Post_timestamp ASC");
        $stmt->bind_param("s", $username); 
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostNewID()
    {
        $stmt = $this->db->prepare("SELECT PostID FROM post ORDER BY Post_timestamp DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNewPost($postID, $post_timestamp, $post_text, $post_image, $username)
    {
        $stmt = $this->db->prepare("INSERT INTO post(PostID, Post_timestamp, Post_text, Post_image, Username)
         VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $postID, $post_timestamp, $post_text, $post_image, $username);
        return $stmt->execute();
    }
    public function deletePost($postID){
        $stmt = $this->db->prepare("DELETE FROM post WHERE PostID = ?");
        $stmt->bind_param("i", $postID); 
        return $stmt->execute();
    }

    // ------------------------------------ COMMENT--------------------------------------------
    public function getCommentPost($postID)
    {
        $stmt = $this->db->prepare("SELECT * FROM comment as c, user as u WHERE u.username = c.username 
        AND PostID = ?");
        $stmt->bind_param("i", $postID); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNewComment($commentID, $comment_text, $comment_date, $postID, $username)
    {
        $stmt = $this->db->prepare("INSERT INTO comment(CommentID, Comment_text, Comment_date, PostID, Username)
         VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $commentID, $comment_text, $comment_date, $postID, $username);
        return $stmt->execute();
    }

    public function getCommentNewID()
    {
        $stmt = $this->db->prepare("SELECT CommentID FROM comment ORDER BY Comment_date DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }
    
    public function deleteComment($commentID)
    {
        $stmt = $this->db->prepare("DELETE FROM comment WHERE CommentID = ?");
        $stmt->bind_param("s", $commentID); 
        return $stmt->execute();
    }

    // ------------------------------------ TRACK --------------------------------------------
    public function getLatestTracks($username)
    {
        $stmt = $this->db->prepare("SELECT DISTINCT t.TrackID, t.Text_description, t.Track_type, t.Track_length,
         t.Region, t.FileGPX, t.Track_image, t.Track_timestamp, t.Username, u.ProfileImg FROM user as u, track as t, follow as f 
         WHERE f.FOL_Username = t.Username AND f.Username = ?
         ORDER BY Track_timestamp DESC");
        $stmt->bind_param("s", $username); 
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getOlderTracks($username)
    {
        $stmt = $this->db->prepare("SELECT DISTINCT t.TrackID, t.Text_description, t.Track_type, t.Track_length,
        t.Region, t.FileGPX, t.Track_image, t.Track_timestamp, t.Username, u.ProfileImg FROM user as u, track as t, follow as f 
        WHERE f.FOL_Username = t.Username AND f.Username = ?
        ORDER BY Track_timestamp ASC");
        $stmt->bind_param("s", $username); 
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTrackNewID()
    {
        $stmt = $this->db->prepare("SELECT TrackID FROM track ORDER BY Track_timestamp DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNewTrack($ID, $description, $type, $timestamp, $length, $region, $fileGPX, $image, $Username)
    {
        $stmt = $this->db->prepare("INSERT INTO track(TrackID, Text_description, Track_type,
         Track_timestamp, Track_length, Region, FileGPX, Track_image, Username)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $ID, $description, $type, $timestamp, $length, $region, $fileGPX, $image, $Username);
        return $stmt->execute();
    }

    public function getNTrack($username)
    {
        $stmt = $this->db->prepare("SELECT COUNT(TrackID) FROM track WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function deleteTrack($trackID){
        $stmt = $this->db->prepare("DELETE FROM track WHERE TrackID = ?");
        $stmt->bind_param("i", $trackID); 
        return $stmt->execute();
    }

    //-------------------------------------FILTER TRACK QUERY--------------------------------
    public function getFilterType($type)
    {
        $stmt = $this->db->prepare("SELECT * FROM user as u, track as t WHERE u.Username = t.Username AND t.Track_type = ?");
        $stmt->bind_param("s", $type);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }
    public function getFilterkm($km)
    {
        $kmMin = $km - 50;
        $stmt = $this->db->prepare("SELECT * FROM user as u, track as t WHERE u.Username = t.Username AND 
        t.Track_length BETWEEN ? AND ?");
        $stmt->bind_param("ii", $kmMin, $km);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }
    public function getFilterRegion($region)
    {
        $stmt = $this->db->prepare("SELECT * FROM user as u, track as t WHERE u.Username = t.Username AND t.Region = ?");
        $stmt->bind_param("s", $region);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }
    //due valori
    public function getFilterType_Region($type, $region)
    {
        $stmt = $this->db->prepare("SELECT * FROM user as u, track as t WHERE u.Username = t.Username 
        AND t.Region =? AND t.Track_type = ?");
        $stmt->bind_param("ss", $region, $type);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getFilterType_km($type, $km)
    {
        $kmMin = $km - 50;
        $stmt = $this->db->prepare("SELECT * FROM user as u, track as t WHERE u.Username = t.Username AND t.Track_type = ? AND
        t.Track_length BETWEEN ? AND ?");
        $stmt->bind_param("sii", $type, $kmMin, $km);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }
    public function getFilterkm_Region($km, $region)
    {
        $kmMin = $km - 50;
        $stmt = $this->db->prepare("SELECT * FROM user as u, track as t WHERE u.Username = t.Username AND t.Region = ? AND
        t.Track_length BETWEEN ? AND ?");
        $stmt->bind_param("sii", $region, $kmMin, $km);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }
    public function getFilteredtrack($type, $km, $region)
    {
        $kmMin = $km - 50;
        $stmt = $this->db->prepare("SELECT * FROM user as u, track as t WHERE u.Username = t.Username AND t.Region = ? 
        AND t.Track_type = ? AND t.Track_length BETWEEN ? AND ?");
        $stmt->bind_param("ssii", $region,$type, $kmMin, $km);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // ------------------------------------ REVIEW--------------------------------------------
    public function getReviewTrack($trackID)
    {
        $stmt = $this->db->prepare("SELECT * FROM review as r, user as u WHERE u.username = r.username AND r.TrackID = ?");
        $stmt->bind_param("i", $trackID); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNewReview($ID, $text, $date, $voto, $TrackID, $username)
    {
        $stmt = $this->db->prepare("INSERT INTO review(ReviewID, Review_text, Review_timestamp, Review_voto, TrackID, Username)
         VALUES (?, ?, ?, ?, ?,?)");
        $stmt->bind_param("ssssss", $ID, $text, $date, $voto, $TrackID, $username);
        return $stmt->execute();
    }

    public function getReviewNewID()
    {
        $stmt = $this->db->prepare("SELECT ReviewID FROM review ORDER BY Review_timestamp DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }
    public function getAvgrating($trackID){
        $stmt = $this->db->prepare("SELECT AVG(r.Review_voto) as media FROM review as r, track as t WHERE r.TrackID = t.TrackID AND r.TrackID = ?");
        $stmt->bind_param("i", $trackID); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteReview($reviewID)
    {
        $stmt = $this->db->prepare("DELETE FROM review WHERE ReviewID = ?");
        $stmt->bind_param("s", $reviewID); 
        return $stmt->execute();
    }
    // ------------------------------------ USER --------------------------------------------
    public function getAllUser($username)
    {
        $stmt = $this->db->prepare("SELECT Username, Email, ProfileImg FROM user WHERE Username != ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllUsername()
    {
        $stmt = $this->db->prepare("SELECT Username FROM user");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUser($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getUserEmail($username)
    {
        $stmt = $this->db->prepare("SELECT Email FROM user WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getUserImg($username)
    {
        $stmt = $this->db->prepare("SELECT ProfileImg FROM user WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getPostByUser($username)
    {
        $stmt = $this->db->prepare("SELECT p.PostID, p.Post_timestamp, p.Post_text, p.Post_image, p.Username, u.ProfileImg
        FROM user as u, post as p WHERE u.Username = ? AND u.Username = p.Username ORDER BY Post_timestamp DESC");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getTracksByUser($username)
    {
        $stmt = $this->db->prepare("SELECT t.TrackID, t.Text_description, t.Track_type, t.Track_length,
        t.Region, t.FileGPX, t.Track_image, t.Track_timestamp, t.Username, u.ProfileImg FROM user as u, track as t 
        WHERE u.Username = ? AND u.Username = t.Username ORDER BY Track_timestamp DESC");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNewUser($username, $password, $salt, $email)
    {

        $stmt = $this->db->prepare("INSERT INTO user(Username, User_password, Salt, Email, nFollower, nFollow, ProfileImg)
         VALUES (?, ?, ?, ?,0,0, 'upload/login-default.jpg')");
        $stmt->bind_param("ssss", $username, $password, $salt, $email);
        return $stmt->execute();
    }

    // ------------------------------------ FOLLOW da riguardare --------------------------------------------

    public function getUserFollowing($username)
    {
        $stmt = $this->db->prepare("SELECT f.FOL_Username, u.Email, u.ProfileImg  FROM follow AS f, user AS u WHERE f.Username = ? AND f.FOL_Username = u.Username");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getUserFollowers($username)
    {
        $stmt = $this->db->prepare("SELECT f.Username, u.Email, u.ProfileImg  FROM follow AS f, user AS u WHERE FOL_Username = ? AND f.Username = u.Username");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function insertNewFollow($username, $FOL_Username)
    {
        $stmt = $this->db->prepare("INSERT INTO follow(Username, FOL_Username) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $FOL_Username);
        return $stmt->execute();
    }
    public function deleteFollow($username, $FOL_Username)
    {
        $stmt = $this->db->prepare("DELETE FROM follow WHERE Username = ? AND FOL_Username = ?");
        $stmt->bind_param("ss", $username, $FOL_Username);
        return $stmt->execute();
    }
    public function getNFollowers($username)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS total FROM follow WHERE FOL_Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getNFollowing($username)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS total FROM follow WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //----------------------------------LOGIN------------------------------------------
    public function checkPassword($username, $password)
    {
        $stmt = $this->db->prepare("SELECT Username FROM user WHERE Username = ? AND User_password = ?");
        $stmt->bind_param("ss", $username, $password); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function checkUsername($username)
    {
        $stmt = $this->db->prepare("SELECT Username FROM user WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    //----------------------------------NOTIFICHE---------------------------

    public function getNotificNotSeen($username)
    {
        $stmt = $this->db->prepare(("SELECT COUNT(NotID) as notificCount from notifica where Checked = 0 and Username = ?"));
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getNotNewID()
    {
        $stmt = $this->db->prepare("SELECT NotID FROM `notifica` ORDER BY NotID DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }
    public function setNotificaComment($notID, $commentID, $username)
    {
        $stmt = $this->db->prepare("INSERT INTO notifica(NotID, CommentID, Notific_type, ReviewID, Notific_text, Checked, Username) 
        VALUES (?, ?, 'comment', NULL , 'ha commentato il tuo post', 0, ?)");
        $stmt->bind_param("iss", $notID, $commentID, $username);
        return $stmt->execute();
    }
    public function setNotificaReview($notID, $reviewID, $username)
    {
        $stmt = $this->db->prepare("INSERT INTO notifica(NotID, CommentID, Notific_type, ReviewID, Notific_text, Checked, Username) 
        VALUES (?, NULL, 'review', ? , 'ha recensito il tuo track', 0, ?)");
        $stmt->bind_param("iss", $notID, $reviewID, $username);
        return $stmt->execute();
    }
    public function setNotificaFollow($notID, $fol_username, $username)
    {
        $stmt = $this->db->prepare("INSERT INTO notifica(NotID, CommentID, Notific_type, ReviewID, Notific_text, Checked, Username) 
        VALUES (?, NULL, ?, NULL , 'ha iniziato a seguirti', 0, ?)");
        $stmt->bind_param("iss", $notID, $fol_username, $username);
        return $stmt->execute();
    }
    
    public function getNotificaPost($username)
    {
        $stmt = $this->db->prepare("SELECT post.Username as Post_username, notifica.NotID, notifica.Checked, notifica.Notific_text, notifica.Username AS Notific_username,
        comment.Username as Comment_username, user.ProfileImg AS Comment_profileImg FROM notifica,comment, user,post 
        WHERE notifica.CommentID=comment.CommentID AND comment.Username = user.Username AND notifica.Username = ? AND post.PostID = comment.PostID;");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }
    public function getNotificaTrack($username)
    {
        $stmt = $this->db->prepare("SELECT track.Username as Track_username, notifica.NotID, notifica.Checked, notifica.Notific_text,
         notifica.Username AS Notific_username, review.Username as Review_username, user.ProfileImg AS Review_Img 
         FROM notifica,review, user,track WHERE notifica.ReviewID=review.ReviewID AND review.Username = user.Username 
         AND notifica.Username = ? AND track.TrackID = review.TrackID;");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }
    public function getNotificaFollow($username)
    {
        $stmt = $this->db->prepare("SELECT Notific_text, Notific_type, Checked, NotID, ProfileImg as User_Img 
        FROM notifica as n, user as u WHERE n.Username = ? and n.Notific_type = u.Username;");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }
    public function updateNotifica($username)
    {
        $stmt = $this->db->prepare("UPDATE notifica SET Checked = 1 WHERE Username = ? AND Checked = 0");
        $stmt->bind_param("s", $username); // s = string
        return $stmt->execute();
    }

    public function deleteNotifica($commentID){
        $stmt = $this->db->prepare("DELETE FROM notifica WHERE CommentID = ?");
        $stmt->bind_param("s", $commentID); 
        return $stmt->execute();
    }
    public function deleteNotificaReview($reviewID){
        $stmt = $this->db->prepare("DELETE FROM notifica WHERE ReviewID = ?");
        $stmt->bind_param("s", $reviewID); 
        return $stmt->execute();
    }


}

?>