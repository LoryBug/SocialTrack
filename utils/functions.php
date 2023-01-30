<?php

function registerLoggedUser($user){
    $_SESSION["username"] = $user["Username"];
}
function isUserLoggedIn(){
    return !empty($_SESSION["username"]);
}
// transform a multidimensional array into a single array
function multiDimArrayToArray($array){
    $result = array();
    foreach($array as $user){
        array_push($result, $user["FOL_Username"]);
    }
    return $result;
}


?>