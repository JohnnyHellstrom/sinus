<?php
require('../classes/classDBClasses.php');
include('adminview/adminheader.php');

$orderid = filter_input(INPUT_POST,'orderid', FILTER_VALIDATE_INT);


if(isset($_POST['orderdetails'])){
   include('adminview/adminviewOrderdetails.php');
} else {
   include('adminview/adminviewOrders.php');
}
