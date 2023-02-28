<?php
require('../classes/classDBClasses.php');
$customerEmail = filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL);

include('./adminview/adminheader.php');


if($customerEmail){
   $customer = Customer::retrieveCustomerInfo($customerEmail);
   include('./adminview/adminviewCustomerinfo.php');
}
$allcustomers = Customer::retrieveAllCustomers();
include('./adminview/adminviewAllCustomers.php');