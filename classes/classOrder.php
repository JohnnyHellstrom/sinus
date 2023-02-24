<?php


class Order{


  public static function insertNewOrder($id){

    $conn = DB::connect();

    $sql = "INSERT INTO orders(customerid) VALUES = ?";
   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

      // selecting the scope_identity , last inputed into the vehiclearchive
    $lastId = $stmt->insert_id; 

    $stmt->close(); 
    $conn->close();

    return $lastId;
  }

  public static function insertIntoOrderDetails($id){
    $conn = DB::connect();

    $sql = "INSERT INTO orderdetails(productid, orderid,quantity) VALUES (?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iii', $productid, $orderid, $quantity);
    $stmt->execute();

    $stmt->close();
    $conn->close();
  }

}