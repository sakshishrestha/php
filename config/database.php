<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "php";

//to create connection - process via object oriented 

$conn = new mysqli($server,$username,$password,$database);
// $conn = mysqli_connect($server,$username,$database, $password);


// to check the connection 
if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}

// if(!$conn){
//     die("Connection Failed" . mysqli_connect_error());
// }

?>

