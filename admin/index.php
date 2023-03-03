<?php

include('./adminSecurity.php');

if(isset($_POST['logout'])){
   unset($_SESSION);
   session_destroy();
   header('location:../index.php');
}

include('./adminview/adminheader.php');

?>

<h2>What do you want to do?</h2>

