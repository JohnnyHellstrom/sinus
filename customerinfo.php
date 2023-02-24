<?php
require_once('classes/classDBClasses.php');
session_start();


$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW); 
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_UNSAFE_RAW); 
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_UNSAFE_RAW); 
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); 
$phone = filter_input(INPUT_POST, 'phone', FILTER_UNSAFE_RAW); 
$streetadress = filter_input(INPUT_POST, 'streetadress', FILTER_UNSAFE_RAW); 
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_UNSAFE_RAW); 
$city = filter_input(INPUT_POST, 'city', FILTER_UNSAFE_RAW); 
$country = filter_input(INPUT_POST, 'country', FILTER_UNSAFE_RAW); 


$firstname = DataWash::testInput($firstname);
$lastname = DataWash::testInput($lastname);
$email = DataWash::testInput($email);
$phone = DataWash::testInput($phone);
$streetadress = DataWash::testInput($streetadress);
$zipcode = DataWash::testInput($zipcode);
$city = DataWash::testInput($city);
$country = DataWash::testInput($country);

switch($action)
{
  case 'oldcustomerinfo':
    // getting customer id
    $customerId = Customer::retrieveCustomerId($_POST['email']);  
    // update order and order details
    break;

  case 'newcustomerinfo':
    $newCustomer = new Customer(ucfirst($firstname), ucfirst($lastname), strtolower($email), $phone, ucfirst($streetadress), $zipcode, ucfirst($city), ucfirst($country));
    $lastId = $newCustomer->insertInfoToDB();
    break;
  
  case 'existingcustomer':   
    $_SESSION['oldEmail'] = $_POST['email'];    
    header('location: view/viewExistingCustomerform.php');   
    break;
}