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

   public static function Insert($sql, $value){
      $datatype = gettype($value);
      $datatype = substr($datatype, 0, 1);

      $conn = self::connect();
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("$datatype", $value);
      try{
         $count = $stmt->execute();
      } catch (Exception $e){
         echo $e->getMessage();
      }
      
      $stmt->close(); 
      $conn->close();
      return $count;
   }
}