<?php

require('classDB.php');
class Products{
   public static function getAllVehicleTypes(){
      $conn = DB::connect();

      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);

      var_dump($result);

      $conn->close();

   }
}