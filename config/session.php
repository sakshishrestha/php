<?php 
session_start();

//function to check if the session variable member_id is set 

function logged_in(){
    return isset($_SESSION['MEMBER_ID']);
}

//function to check if the user is already logged in or not 
function confirm_logged_in(){
    if(!logged_in()){
        header("Location: index.php");
        die;
    }
}
?>