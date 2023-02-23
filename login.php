<?php


  require_once('classes/classAdminLogin.php');

  $action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW); 
  $user = filter_input(INPUT_POST, 'user', FILTER_UNSAFE_RAW); 
  $email = filter_input(INPUT_POST, 'email', FILTER_UNSAFE_RAW); 
  $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW); 
  

        
  $canWeLogin = new User($user, $email, $password); 
  $canWeLogin->loginWithAccount();

// change that login afterwards
?>