<?php 

// function to validate the input 

function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data; 
}




// function to fetch the single row from db 

function fetch_single($table,$field,$key,$value){
    $sql = "SELECT $field FROM $table WHERE $key = '$value' LIMIT 1";
    $result = $GLOBALS['conn']->query($sql);
    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        return $data;
    }else{
        return FALSE;
    }
}

function fetch_multiple($table,$field,$key,$value) {
    $sql = "SELECT $field FROM $table WHERE $key = '$value'";
  $result = $GLOBALS['conn']->query($sql);
  if ($result->num_rows > 0) {
      $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
      return $data;
  }else{
      return FALSE;
  }	
}

// function to fetch custon row from db 

function fetch_custom($sql) {
	$result = $GLOBALS['conn']->query($sql);
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
    var_dump($data);
    if($data){
        $_SESSION['MEMBER_ID'] = $data[0]['id'];  //not understood the way 
        $_SESSION['FIRST_NAME'] = $data[0]['first_name'];
        $_SESSION['LAST_NAME'] = $data[0]['last_name'];
        return TRUE;
    }else{
        return FALSE;
    }

}

function logout_user(){
	unset($_SESSION['MEMBER_ID']);
	unset($_SESSION['FIRST_NAME']);
	unset($_SESSION['LAST_NAME']);
}

?>