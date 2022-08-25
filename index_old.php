<?php 
require("config/constant.php");
require("config/helper.php");
require("config/session.php");


//redirect to template page if the user is logged in
if(logged_in()){
    header( "Location: home.php" ); die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/style.css">
    <title>Welcome to <?=PROJECT_MODULE?></title>
</head>
<body>

    <div class="container">
        <form action="login.php" method="post">
            <div class="container">
                <label for="email">Enter Email</label>
                <input type="email" name="email" placeholder="Email">

                <label for="password">Enter Password</label>
                <input type="password" name="password" placeholder="Password">

                <button type="submit">Submit</button>
                
            </div>
        </form> 
    </div>
   
</body>
</html>