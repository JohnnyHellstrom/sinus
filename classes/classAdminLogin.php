<?php
require_once('classes/classDB.php');

class User
{
  private $userHandle;
  private $userEmail;
  private $userPassword;

  public function __construct($userHandle, $userEmail, $userPassword)
  {
    $this->userHandle = $userHandle;
    $this->userEmail = $userEmail;
    $this->userPassword = $userPassword;
  }

  public function getUserHandle()
  {
    return $this->userHandle;
  }

  public function getUserEmail()
  {
    return $this->userEmail;
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
    
    $statement = $mysqli->prepare('INSERT INTO users (handle, email, password) values (?,?,?)');
    $statement->bind_param('sss', $handle, $email, $password);
    
    $handle = $this->getUserHandle();
    $email = $this->getUserEmail();    
    $password1 = $this->getUserPassword();
    $password = password_hash($password1, PASSWORD_DEFAULT);

    $statement->execute();    

    $statement->close();
    $mysqli->close();     
  }
   
  public function loginWithAccount()
  {
    $mysqli = DB::connect();      
      
    $statement = $mysqli->prepare('SELECT handle, email, password FROM users where handle = ?');
    $statement->bind_param('s', $handle);    
    
    $handle = $this->getUserHandle();
    $password = $this->getUserPassword();

    $statement->execute();
    $result = $statement->get_result();

    $row = $result->fetch_assoc();

    $statement->close();
    $mysqli->close();

    session_start();
    if($password = password_verify($password, $row['password']))
    {
      $_SESSION['handle'] = $handle;      
      header('location: index.php');      
    }
    else
    {       
      $_SESSION['error'] = 'something went wrong!';
      header('location: view/loginform.php');
    }
  }
}