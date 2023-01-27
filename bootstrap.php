<?php
session_start();
require_once("utils/functions.php");
require_once("db/database.php");

$dbh = new DatabaseHelper("localhost", "root", "", "socialtrack_db", 3306);
define("UPLOAD_DIR", "./upload/")
?>