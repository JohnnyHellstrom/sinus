<?php

class OrderDetails{

  private $productid;
  private $title;
  private $color;
  private $quantity;

  public function __construct($productid, $title, $color, $quantity){
    $this->productid = $productid;
    $this->title = $title;
    $this->color = $color;
    $this->quantity = $quantity;
  }

  public function getProductid(){
    return $this->productid;
  }
  public function getTitle(){
    return $this->title;
  }
  public function getColor(){
    return $this->color;
  }
  public function getQuantity(){
    return $this->quantity;
  }

  public static function getOrdersDetails($orderid){
    $conn = DB::connect();
    $result = $conn->query("SELECT p.productid, p.title, c.colorname, od.quantity
                              FROM products AS p
                              JOIN colors AS c ON c.colorid = p.colorid
                              JOIN orderdetails AS od ON od.orderdetailsid = p.productid
                              JOIN orders AS o ON o.orderid = od.orderid
                              WHERE o.orderid = $orderid");                              
    
    $allorders = array();
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $orderdetails = new OrderDetails($row['productid'],$row['title'],$row['colorname'],$row['quantity']);
        $allorders[] = $orderdetails;
      }
    }
    $conn->close();
    return $allorders;
  }
}