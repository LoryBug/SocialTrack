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
    public function getLatestPosts()
    {
        $stmt = $this->db->prepare("SELECT p.PostID, p.Post_timestamp, p.Post_text, p.Post_image, p.Username, u.ProfileImg
         FROM user as u, post as p WHERE u.Username = p.Username ORDER BY Post_timestamp DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOlderPosts()
    {
        $stmt = $this->db->prepare("SELECT p.PostID, p.Post_timestamp, p.Post_text, p.Post_image, p.Username, u.ProfileImg
        FROM user as u, post as p WHERE u.Username = p.Username ORDER BY Post_timestamp ASC");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostNewID()
    {
        $stmt = $this->db->prepare("SELECT COUNT(PostID)+1 FROM post");
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
        $stmt = $this->db->prepare("SELECT COUNT(CommentID)+1 FROM comment");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    // ------------------------------------ TRACK --------------------------------------------
    public function getLatestTracks()
    {
        $stmt = $this->db->prepare("SELECT t.TrackID, t.Text_description, t.Track_type, t.Track_length,
         t.Region, t.FileGPX, t.Track_image, t.Track_timestamp, t.Username, u.ProfileImg FROM user as u, track as t 
         WHERE u.Username = t.Username ORDER BY Track_timestamp DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
   

    public function getTrackNewID()
    {
        $stmt = $this->db->prepare("SELECT COUNT(TrackID)+1 FROM track");
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
        $stmt = $this->db->prepare("SELECT COUNT(ReviewID)+1 FROM review");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    // ------------------------------------ USER --------------------------------------------
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

    public function insertNewUser($username,$password,$email)
    {

        $stmt = $this->db->prepare("INSERT INTO user(Username, User_password, Email, nFollower, nFollow, ProfileImg)
         VALUES (?, ?, ?,0,0, 'upload/login-default.jpg')");
        $stmt->bind_param("sss", $username, $password, $email);
        return $stmt->execute();
    }

    public function getNFollowers($username)
    {
        $stmt = $this->db->prepare("SELECT nFollower FROM user WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getNFollowing($username)
    {
        $stmt = $this->db->prepare("SELECT nFollow FROM user WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
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

    //----------------------------------LOGIN------------------------------------------
    public function checkLogin($username, $password)
    {
        $stmt = $this->db->prepare("SELECT Username FROM user WHERE Username = ? AND User_password = ?");
        $stmt->bind_param("ss", $username, $password); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    //----------------------------------NOTIFICHE---------------------------ù
    //public function getNotificationsByUser($username)
    //{
      //  $stmt = $this->db->prepare("SELECT n.NotificationID, n.Notification_timestamp, n.Notification_text, n.Username, u.ProfileImg
        //FROM user as u, notifica as n WHERE u.Username = ? AND u.Username = n.Username ORDER BY Notification_timestamp DESC");
       // $stmt->bind_param("s", $username); // s = string
        //$stmt->execute();
        //$result = $stmt->get_result();
        //return $result->fetch_all(MYSQLI_ASSOC);
    //}
    public function getNotifica($username)
    {
        $stmt = $this->db->prepare("SELECT notifica.NotID, notifica.Checked, notifica.Notific_text, notifica.Username AS Notific_username, comment.Username as Comment_username, user.ProfileImg AS Comment_profileImg
        FROM notifica, comment, user
        WHERE notifica.CommentID=comment.CommentID AND comment.Username = user.Username AND notifica.Username = ?");
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


}

?>