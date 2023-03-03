<?php
  include('./adminSecurity.php');
  include('./adminview/adminheader.php');
  include('./adminview/adminSignupForm.php');  
  require('../classes/classDBClasses.php');

  $action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW); 
  $user = DataWash::testInput(filter_input(INPUT_POST, 'user', FILTER_UNSAFE_RAW));   
  $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW); 
 
  if(isset($_POST['user'])) {   
  $createAccount = new User($user, $password); 
  $createAccount->createAccount(); 
  echo 'user was created...';      
  }
?>
