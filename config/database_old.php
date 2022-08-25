<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "php";







//to create connection - process via object oriented 
$conn = new mysqli($server,$username,$password,$database);
// $conn = mysqli_connect($server,$username,$database, $password);


//to check if the connection is initialized or not 
if($conn!=null){
    return $conn;
    // var_dump($conn);die();
}


// to check the connection 
if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}

// if(!$conn){
//     die("Connection Failed" . mysqli_connect_error());
// }

?>


<!-- $connection = if(connection!=null){
     return connection;
}
else{
  return new mysqli($server,$username,$password,$database);
}


$connection = if(connection==null){
    return new mysqli($server,$username,$password,$database);
}
else{
    return connection;
}  -->