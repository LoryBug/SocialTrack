<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if($this->db->connect_error){
            die("Connesione fallita al db");
        }
    }
    // TODO: tutte le add e le update
    
    // ------------------------------------ POST --------------------------------------------
    public function getRandomPosts($n=2){
        $stmt = $this->db->prepare("SELECT PostID, Timestamp, Text, Image, Username FROM post ORDER BY RAND() LIMIT ?");
        $stmt->bind_param("i", $n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getLatestPosts($n){
        $stmt = $this->db->prepare("SELECT * FROM post ORDER BY 'Timestamp' ASC LIMIT ?");
        $stmt->bind_param("i", $n); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCommentPost($postID){
        $stmt = $this->db->prepare("SELECT * FROM comment WHERE PostID = ?");
        $stmt->bind_param("i", $postID); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    
    // ------------------------------------ TRACK --------------------------------------------

    public function getLatestTracks($n){
        $stmt = $this->db->prepare("SELECT * FROM track ORDER BY Track_timestamp ASC LIMIT ?");
        $stmt->bind_param("i", $n); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getTrackByRegion($region){
        $stmt = $this->db->prepare("SELECT * FROM track WHERE Region = ?");
        $stmt->bind_param("s", $region); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getTrackByLength($length){
        $stmt = $this->db->prepare("SELECT * FROM track WHERE Track_length <= ?");
        $stmt->bind_param("i", $length); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getTrackByType($type){
        $stmt = $this->db->prepare("SELECT * FROM track WHERE Track_type = ?");
        $stmt->bind_param("s", $type); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getReviewTrack($trackID){
        $stmt = $this->db->prepare("SELECT * FROM review WHERE TrackID = ?");
        $stmt->bind_param("i", $trackID); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTopTracks($n){
        $stmt = $this->db->prepare("SELECT TrackID, AVG(Vote) FROM review GROUP BY TrackID ORDER BY AVG(Vote) DESC LIMIT ?");
        $stmt->bind_param("i", $n); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAvgVoteTrack($trackID){
        $stmt = $this->db->prepare("SELECT AVG(Vote) FROM review WHERE TrackID = ?");
        $stmt->bind_param("i", $trackID); // i = integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
        
    // ------------------------------------ USER --------------------------------------------

    
    public function getUser($username){
        $stmt = $this->db->prepare("SELECT * FROM user WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getUserImg($username){
        $stmt = $this->db->prepare("SELECT I<ProfileImg FROM user WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getTrackByUser($username){
        $stmt = $this->db->prepare("SELECT * FROM track WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getPostByUser($username){
        $stmt = $this->db->prepare("SELECT * FROM post WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }



    // ------------------------------------ FOLLOW da riguardare --------------------------------------------
    public function getUserFollowing($username){
        $stmt = $this->db->prepare("SELECT * FROM follow WHERE Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getUserFollowers($username){
        $stmt = $this->db->prepare("SELECT * FROM follow WHERE FOL_Username = ?");
        $stmt->bind_param("s", $username); // s = string
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
}

?>