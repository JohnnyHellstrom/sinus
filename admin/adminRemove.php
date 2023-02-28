<?php
require('../classes/classDBClasses.php');
include('adminview/adminheader.php');
$users = RemoveUser::getUserDetails();
include('adminview/adminviewRemoveUsers.php');

if(isset($_POST['edit']) && ($_POST['edit'] == "✏️")){ 
  RemoveUser::removeUser($_POST['id']);
}