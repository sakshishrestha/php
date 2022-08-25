<?php 

// require("config/database.php");
require_once 'database.php';
// function to validate the input 

// var_dump($database);

function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data; 
}




// function to fetch the single row from db 

function fetch_single($table,$field,$key,$value){
    $sql = "SELECT $field FROM $table WHERE $key = '$value' LIMIT 1";
    $result = $GLOBALS['database']->query($sql);
    // var_dump($database);
    // $db = Db::getInstance();
    // var_dump($db);
    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        return $data;
    }else{
        return FALSE;
    }
}

function fetch_multiple($table,$field,$key,$value) {
    $sql = "SELECT $field FROM $table WHERE $key = '$value'";
//   $result = $GLOBALS['conn']->query($sql);
  $result = $GLOBALS['database']->query($sql);
  if ($result->num_rows > 0) {
      $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
      return $data;
  }else{
      return FALSE;
  }	
}


// function to get the user id by email 

function get_user_id($email){
    $data = fetch_single('users','id', 'email', $email);
    if($data){
        return $data;
    }
    else{
        return FALSE;
    }
}

// function to validate the user 

function validate_user($email,$password){

    $password = md5($password); //to encript the password to md5
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    $data = fetch_custom($sql);
    // var_dump($data);
    if($data){
        $_SESSION['MEMBER_ID'] = $data[0]['id'];  //not understood the way 
        $_SESSION['FIRST_NAME'] = $data[0]['first_name'];
        $_SESSION['LAST_NAME'] = $data[0]['last_name'];
        return TRUE;
    }else{
        return FALSE;
    }

}
// function to fetch custon row from db 

function fetch_custom($sql) {
	// $result = $GLOBALS['conn']->query($sql);
    
	$result = $GLOBALS['database']->query($sql);
	if ($result->num_rows > 0) {
    	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    	return $data;
	}else{
		return FALSE;
	}	
}


function logout_user(){
	unset($_SESSION['MEMBER_ID']);
	unset($_SESSION['FIRST_NAME']);
	unset($_SESSION['LAST_NAME']);
}




// function validate_employees($name,$address,$salary){
//     $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
//     if($stmt = mysqli_prepare($conn, $sql)){
//         // Bind variables to the prepared statement as parameters
//         mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);
        
        
//         // Set parameters
//         $param_name = $name;
//         $param_address = $address;
//         $param_salary = $salary;
        
//         // Attempt to execute the prepared statement
//         if(mysqli_stmt_execute($stmt)){
//             // Records created successfully. Redirect to landing page
//             header("location: index.php");
//             exit();
//         } else{
//             echo "Oops! Something went wrong. Please try again later.";
//         }
//     }
     
//     // Close statement
//     mysqli_stmt_close($stmt);

// }
?>