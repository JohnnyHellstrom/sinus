<?php


require('../classes/classDBClasses.php');

  $action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW); 
  $user = filter_input(INPUT_POST, 'user', FILTER_UNSAFE_RAW);
  $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW); 
  

       
  $canWeLogin = new User($user, $password); 
  $canWeLogin->loginWithAccount();
  

// change that login afterwards
  header('location: index.php');
?>