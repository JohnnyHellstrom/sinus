<?php

session_start();
if(!isset($_SESSION['user']))
{
  header('Location: ./adminview/adminloginform.php');
}