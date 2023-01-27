<?php

function registerLoggedUser($user){
    $_SESSION["username"] = $user["Username"];
}
function isUserLoggedIn(){
    return !empty($_SESSION["username"]);
}

?>