<?php 

require_once ('config/database.php');

$user = Database::getInstance()->query('SELECT * FROM users');
if($users->count()){
    foreach($users->results() as $user){
        echo $user->name, '<br>';
    }
}
// echo $user->count();