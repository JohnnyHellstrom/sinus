<?php
//require_once('classDB.php');


class Customer{

 
  private $firstName;
  private $lastName;
  private $email;
  private $phone;
  private $adress;
  private $zipcode;
  private $city;
  private $country;

  function __construct($firstName,$lastName,$email,$phone,$adress,$zipcode,$city,$country)
  {    
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->phone = $phone;
    $this->adress = $adress;
    $this->zipcode = $zipcode;
    $this->city = $city;
    $this->country = $country;
  }

  public function getFirstName()
  {
    return $this->firstName;
  }
  public function getLastName()
  {
    return $this->lastName;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getPhone()
  {
    return $this->phone;
  }
  public function getAdress()
  {
    return $this->adress;
  }
  public function getZipcode()
  {
    return $this->zipcode;
  }
  public function getCity()
  {
    return $this->city;
  }
  public function getCountry()
  {
    return $this->country;
  }


  public function insertInfoToDB(){
    $conn = DB::connect();

    $sql = $conn->prepare('INSERT INTO customers (firstname,lastname,email,phone,streetadress,zipcode,city,country) values (?,?,?,?,?,?,?,?)');
    $sql -> bind_param('ssssssss',$firstName, $lastName, $email, $phone, $adress, $zipcode, $city, $country);

    $firstName = $this->getFirstName();
    $lastName = $this->getLastName();
    $email = $this->getEmail();
    $phone = $this->getPhone();
    $adress = $this->getAdress();
    $zipcode = $this->getZipcode();
    $city = $this->getCity();
    $country = $this->getCountry();    

    $sql->execute();   
     // selecting the scope_identity , last inputed into the vehiclearchive
    $lastId = $sql->insert_id; 

    $sql->close();
    $conn->close(); 

    return $lastId["customerid"];
  }

  public static function retrieveCustomerInfo($email)
  {
    $conn = DB::connect();

    $sql = $conn->prepare('SELECT * FROM customers WHERE email = ?');
    $sql->bind_param('s', $email);
   
    $sql->execute();
    $result = $sql->get_result();

    if($result->num_rows > 0){
       $row = $result->fetch_assoc();
       $oldCustomer = new Customer($row['firstname'], $row['lastname'], $row['email'], $row['phone'], $row['streetadress'], $row['zipcode'], $row['city'], $row['country']);
       $sql->close(); 
       $conn->close();
       return $oldCustomer;
    } else {
       $sql->close(); 
       $conn->close();
       return null;
    }
  }

  public static function retrieveCustomerId($email)
  {
    $conn = DB::connect();

    $sql = $conn->prepare('SELECT customerid FROM customers WHERE email = ?');
    $sql->bind_param('s', $email);
   
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->fetch_assoc();

    $sql->close(); 
    $conn->close();

    return $row['customerid'];
  }
}








?>