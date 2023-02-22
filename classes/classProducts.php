<?php

require('classDB.php');

class Product{
   private $productid;
   private $title;
   private $category;
   private $color;
   private $price;
   private $image;

   public function __construct($id, $title, $category, $color, $price, $image = null){
      $this->productid = $id;
      $this->title = $title;
      $this->category = $category;
      $this->color = $color;
      $this->price = $price;
      $this->image = $image;
   }

   public static function getAllProducts(){
      $conn = DB::connect();

      $sql = "SELECT p.productid, p.title, k.categoryname, c.colorname, p.price FROM products p
         JOIN colors c ON c.colorid = p.colorid
         JOIN categories k ON k.categoryid = p.categoryid";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
            $product = new Product($row['productid'], $row['title'], $row['categoryname'], $row['colorname'], $row['price']);
            echo '<pre>'; var_dump($product); echo '</pre>';
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
}