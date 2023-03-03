<?php
include('./adminSecurity.php');
require('../classes/classDBClasses.php');
include('./adminview/adminheader.php');

//Displays all adminusers
$users = RemoveUser::getUserDetails();
include('./adminview/adminviewRemoveUsers.php');

//Removes selected adminuser
if(isset($_POST['edit']) && ($_POST['edit'] == "☠️")){ 
  RemoveUser::removeUser($_POST['id']);
}