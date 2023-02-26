<?php
require_once('classes/classDBClasses.php');
require('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// creating an instance of the phpmailer class passing in true as the first argument
// this argument will configure phpmailer to throw an exception if there is a problem
$mail = new PHPMailer(true);

// we are telling the mail that we are using an smpt server by calling the smpt method
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = 'smtp.gmail.com';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = 'sinusskateshop@gmail.com';
$mail->Password = 'tllgronvvofsgrlv';

$storeEmail = 'sinusskateshop@gmail.com';
$storeConfirmation = 'Sinus Skate Shop';


// $mail->setFrom($email, $name);
// $mail->addAddress('pstromstedt@telia.com');


// $mail->Subject = $lastname;
// $mail->Body = $country;




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
    $mail->setFrom($storeEmail, $storeConfirmation);
    $mail->addAddress($_POST['email']);


    // $mail->isHTML(true);
    $mail->Subject = $lastname;
    $mail->Body = $country;
    $mail->send();
    echo 'thank you ordering, a confirmation email has been sent!';
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

// https://github.com/phpmailer/phpmailer
// download composer to be able to install the mail server thingie in cmd prompt
// using the composer thingie from that github

// sinusskateshop@gmail.com
// pw: b@llong2023