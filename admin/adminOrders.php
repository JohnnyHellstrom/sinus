<?php
include('./adminSecurity.php');
require('../classes/classDBClasses.php');
include('./adminview/adminheader.php');

$orderid = DataWash::testInput(filter_input(INPUT_POST,'orderid', FILTER_VALIDATE_INT));





if(isset($_POST['orderdetails'])){
   $orderdetail = OrderDetails::getOrdersDetails($orderid);
   $customerEmail = Customer::getCustomerEmail($orderid);
   $customer = Customer::retrieveCustomerInfo($customerEmail);  
   include('./adminview/adminviewOrderdetails.php'); 
   include('./adminview/adminviewCustomerinfo.php');   
} else {
   $orders = Order::getAllOrders();
   include('./adminview/adminviewOrders.php');   
}
