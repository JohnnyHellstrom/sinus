<?php
require_once('./classes/classDBClasses.php');

session_start();

$action = DataWash::testInput(filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW)); 
$firstname = DataWash::testInput(filter_input(INPUT_POST, 'firstname', FILTER_UNSAFE_RAW)); 
$lastname = DataWash::testInput(filter_input(INPUT_POST, 'lastname', FILTER_UNSAFE_RAW)); 
$email = DataWash::testInput(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)); 
$phone = DataWash::testInput(filter_input(INPUT_POST, 'phone', FILTER_UNSAFE_RAW)); 
$streetadress = DataWash::testInput(filter_input(INPUT_POST, 'streetadress', FILTER_UNSAFE_RAW)); 
$zipcode = DataWash::testInput(filter_input(INPUT_POST, 'zipcode', FILTER_UNSAFE_RAW)); 
$city = DataWash::testInput(filter_input(INPUT_POST, 'city', FILTER_UNSAFE_RAW)); 
$country = DataWash::testInput(filter_input(INPUT_POST, 'country', FILTER_UNSAFE_RAW)); 
$oldemail = DataWash::testInput(filter_input(INPUT_POST, 'oldemail', FILTER_SANITIZE_EMAIL));

include('./view/header.php');

switch($action)
{
  case 'oldcustomerinfo':
    // getting customer id
    $customerId = Customer::retrieveCustomerId($email);  
    break;

  case 'newcustomerinfo':
    $newCustomer = new Customer(ucfirst($firstname), ucfirst($lastname), strtolower($email), $phone, ucfirst($streetadress), $zipcode, ucfirst($city), ucfirst($country));
    $customerId = $newCustomer->insertInfoToDB();
    break;
}
if(empty($_SESSION['cart'])){
  $_SESSION['message'] = "You cannot place order with empty cart";
  header('location:cart.php');
} else if(isset($customerId) && isset($_SESSION['cart'])){
  $orderid = Order::insertNewOrder($customerId);
  foreach ($_SESSION['cart'] as $id => $qty) {
    Order::insertIntoOrderDetails($id, $orderid, $qty);
  } 
  $orderdetail = OrderDetails::getOrdersDetails($orderid);
  include('./view/viewCheckout.php');
  unset($_SESSION);
  session_destroy();

} else if(isset($_POST['newcustomer'])){
  include('./view/viewNewCustomerform.php');

} else if(isset($_POST['existingcustomer'])){
  $oldCustomer = Customer::retrieveCustomerInfo($oldemail);
  include('./view/viewExistingCustomerform.php');

} else if(isset($_SESSION['cart'])) {
  include('./view/viewNewOrExistingCust.php');
} else {
  header('location:index.php');
}



include('./view/footer.php');