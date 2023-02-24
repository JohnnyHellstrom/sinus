<?php

//require('classDB.php');

class Product{
   private $productid;
   private $title;
   private $category;
   private $color;
   private $price;
   private $image;
   private $description;
   private $qty;

   public function __construct($id, $title, $category, $color, $price, $description, $image = null, $qty = null){
      $this->productid = $id;
      $this->title = $title;
      $this->category = $category;
      $this->color = $color;
      $this->price = $price;
      $this->image = $image;
      $this->qty = $qty;
      $this->description = $description;
   }

   public static function addProduct($product){

      
   }

   public static function getProduct($id){
      $conn = DB::connect();

      $sql = "SELECT p.productid, p.title, k.categoryname, c.colorname, p.price, p.description, i.image 
         FROM products p
         JOIN colors c ON c.colorid = p.colorid
         JOIN categories k ON k.categoryid = p.categoryid
         JOIN images i ON i.productid = p.productid
         WHERE p.productid = ?";
   
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();

      if($result->num_rows > 0){
         $row = $result->fetch_assoc();
         $product = new Product($row['productid'], $row['title'], $row['categoryname'], $row['colorname'], $row['price'], $row['description'], $row['image']);
         $stmt->close(); 
         $conn->close();
         return $product;
      } else {
         $stmt->close(); 
         $conn->close();
         return null;
      }
   }

   public static function getAllProducts(){
      $conn = DB::connect();

      $sql = "SELECT p.productid, p.title, k.categoryname, c.colorname, p.price, p.description, i.image 
      FROM products p
      JOIN colors c ON c.colorid = p.colorid
      JOIN categories k ON k.categoryid = p.categoryid
      JOIN images i ON i.productid = p.productid";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
            $product = new Product($row['productid'], $row['title'], $row['categoryname'], $row['colorname'], $row['price'], $row['description'], $row['image']);
            $allProducts[] = $product;     
         }
         $conn->close();
         return $allProducts;
      } else {
         $conn->close();
         return array();
      } 

   }

   public function getProductid(){
      return $this->productid;
   }
   public function getTitle(){
      return $this->title;
   }
   public function getCategory(){
      return $this->category;
   }
   public function getColor(){
      return $this->color;
   }
   public function getPrice(){
      return $this->price;
   }
   public function getImage(){
      return $this->image;
   }
   public function getQty(){
      return $this->qty;
   }
   public function setQty($qty){
      $this->qty = $qty;
   }
   public function getDescription(){
      return $this->description;
   }
}