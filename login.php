
<?php
// require("config/session.php");
// require("config/database.php");
// require("config/helper.php");

$email = validate_input(isset($_POST['email'])?$_POST['email']:'');
$password = validate_input(isset($_POST['password'])?$_POST['password']:'');

// var_dump('here');
// ob_start();  

// var_dump("abcdefgh");
// echo("<script>console.log('PHP: small');</script>");


if($_SERVER['REQUEST_METHOD']==='POST' && is_array($_POST) && !empty($email) && !empty($password)){
    // ob_start();  

    //get user id
    // $user_id = get_user_id($email);
    // var_dump($user_id);
    // print_r($user_id);
    
    //check user is valid or not
    $status = validate_user($email,$password);
    
    // print_r($status);
    
    // echo("<script>console.log('PHP: " . $status . "');</script>");

 
	if($status){
		header( "Location: home.php" ); die;		
	}else{
        header( "Location: index.php"); die;

	}
}else{
	header( "Location: index.php" ); die;
}
?>