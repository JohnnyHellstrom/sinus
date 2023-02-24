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

    $sql->close();
    $conn->close();  
  }
}








?>