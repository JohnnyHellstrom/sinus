<?php

  
  require('../classes/classDBClasses.php');

  $action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW); 
  $user = filter_input(INPUT_POST, 'user', FILTER_UNSAFE_RAW); 
  $email = filter_input(INPUT_POST, 'email', FILTER_UNSAFE_RAW); 
  $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW); 
  
 
 
        
  $createAccount = new User($user, $email, $password); 
  $createAccount->createAccount();       

// change that login afterwards
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">


<h2>Creating an account was a SUCCESS, lets try to login now!</h2>
<button><a href="adminview/adminLoginform.php">Go to Login</a></button>