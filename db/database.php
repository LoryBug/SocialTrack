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
        $stmt = $this->db->prepare("SELECT PostID, Post_timestamp, Post_text, Post_image, Username FROM post");
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

    public function getLatestTracks($n)
    {
        $stmt = $this->db->prepare("SELECT * FROM track ORDER BY Track_timestamp ASC LIMIT ?");
        $stmt->bind_param("i", $n); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getTrackByRegion($region)
    {
        $stmt = $this->db->prepare("SELECT * FROM track WHERE Region = ?");
        $stmt->bind_param("s", $region); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getTrackByLength($length)
    {
        $stmt = $this->db->prepare("SELECT * FROM track WHERE Track_length <= ?");
        $stmt->bind_param("i", $length); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getTrackByType($type)
    {
        $stmt = $this->db->prepare("SELECT * FROM track WHERE Track_type = ?");
        $stmt->bind_param("s", $type); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getReviewTrack($trackID)
    {
        $stmt = $this->db->prepare("SELECT * FROM review WHERE TrackID = ?");
        $stmt->bind_param("i", $trackID); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTopTracks($n)
    {
        $stmt = $this->db->prepare("SELECT TrackID, AVG(Vote) FROM review GROUP BY TrackID ORDER BY AVG(Vote) DESC LIMIT ?");
        $stmt->bind_param("i", $n); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAvgVoteTrack($trackID)
    {
        $stmt = $this->db->prepare("SELECT AVG(Vote) FROM review WHERE TrackID = ?");
        $stmt->bind_param("i", $trackID); // i = integer
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
    public function getUserImg($username)
    {
        $stmt = $this->db->prepare("SELECT ProfileImg FROM user WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getTrackByUser($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM track WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getPostByUser($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM post WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }



    // ------------------------------------ FOLLOW da riguardare --------------------------------------------
    public function getUserFollowing($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM follow WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getUserFollowers($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM follow WHERE FOL_Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>