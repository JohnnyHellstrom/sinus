<?php
require_once('../classes/classDB.php');

class User
{
  private $username;
  private $userPassword;

  public function __construct($username, $userPassword)
  {
    $this->username = $username;
    $this->userPassword = $userPassword;
  }


  public function getUsername()
  {
    return $this->username;
  }

  public function getUserPassword()
  {
    return $this->userPassword;
  }

  public function createAccount()
  {
    $mysqli = DB::connect();
    if($mysqli->connect_error)
    {
      die("Connection failed: " . $mysqli->connect_error);
    } 
    
    $statement = $mysqli->prepare('INSERT INTO admin (username, password) values (?,?)');
    $statement->bind_param('ss', $username, $password);
    
    $username = $this->getUsername();    
    $password1 = $this->getUserPassword();
    $password = password_hash($password1, PASSWORD_DEFAULT);

    $statement->execute();    

    $statement->close();
    $mysqli->close();     
  }
   
  public function loginWithAccount()
  {
    $mysqli = DB::connect();      
      
    $statement = $mysqli->prepare('SELECT username, password FROM admin where username = ?');
    $statement->bind_param('s', $username);    
    
    $username = $this->getUsername();
    $password = $this->getUserPassword();

    $statement->execute();
    $result = $statement->get_result();

    $row = $result->fetch_assoc();

    $statement->close();
    $mysqli->close();

    session_start();
    if($password = password_verify($password, $row['password']))
    {
      $_SESSION['username'] = $username;      
      header('location: index.php');      
    }
    else
    {       
      $_SESSION['error'] = 'something went wrong!';
      header('location: adminview/loginform.php');
    }
  }
}