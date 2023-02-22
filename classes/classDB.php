<?php

class DB{
      public static function connect(){
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "sinus";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }
      return $conn;
   }
}