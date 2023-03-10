<?php

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
      $this->title = strtolower($title);
      $this->category = strtolower($category);
      $this->color = strtolower($color);
      $this->price = $price;
      $this->image = $image;
      $this->qty = $qty;
      $this->description = $description;
   }

   public static function getSearchedProducts($searchword, $categoryid, $colorid){
      $conn = DB::connect();

      $sql = "SELECT p.productid, p.title, k.categoryname, c.colorname, p.price, p.description, i.image 
      FROM products p
      JOIN colors c ON c.colorid = p.colorid
      JOIN categories k ON k.categoryid = p.categoryid
      JOIN images i ON i.productid = p.productid
      WHERE ";

      $datatypes = "";
      $params = array();

      if($searchword){
         if($datatypes){
            $sql .= " AND ";
         }
         $sql .= "p.title LIKE ?";
         $datatypes .= "s";
         $searchword = '%' .$searchword. '%';
         $params[] = $searchword;
      }
      if($categoryid){
         if($datatypes){
            $sql .= " AND ";
         }
         $sql .= "p.categoryid = ?";
         $datatypes .= "i";
         $params[] = $categoryid;
      }
      if($colorid){
         if($datatypes){
            $sql .= " AND ";
         }
         $sql .= "p.colorid = ?";
         $datatypes .= "i";
         $params[] = $colorid;
      }
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("$datatypes", ...$params);
      $stmt->execute();
      $result = $stmt->get_result();
 
      $allProducts = array();
      if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
            $product = new Product($row['productid'], $row['title'], $row['categoryname'], $row['colorname'], $row['price'], $row['description'], $row['image']);
            $allProducts[] = $product;     
         }

      } 
      $conn->close();
      return $allProducts;
   }

   public static function addProduct($product){
      $conn = DB::connect();

      $title = $product->getTitle();
      $category = $product->getCategory();
      $color = $product->getColor();
      $price = $product->getPrice();
      $description = $product->getDescription();
      $stmt = $conn->prepare("INSERT INTO products (title, categoryid, colorid, price, description) VALUES (?,?,?,?,?)");
      $stmt->bind_param("siids",$title ,$category ,$color ,$price ,$description);
      try{
         $stmt->execute();
      } catch (Exception $e){
         echo $e->getMessage();
      }
      $id = $stmt->insert_id;
      if($id){
         echo '<br>Product added successfully';
      } else {
         echo '<br>Product not added. Try again';
      }
      $stmt->close(); 
      $conn->close(); 
      return $id;
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
      $allProducts = array();

      if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
            $product = new Product($row['productid'], $row['title'], $row['categoryname'], $row['colorname'], $row['price'], $row['description'], $row['image']);
            $allProducts[] = $product;     
         }

      } else {
         echo 'No products found';
      } 
      $conn->close();
      return $allProducts;
   }   

   public static function updateProduct($product){
      $conn = DB::connect();

      $sql = "UPDATE products 
               SET title = ?, categoryid = ?, colorid = ?, price = ?, description = ? 
               WHERE productid = ?";

      $id = $product->getProductid();
      $title = $product->getTitle();
      $categoryid = $product->getCategory();
      $colorid = $product->getColor();
      $price = $product->getPrice();
      $description = $product->getDescription();
      
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("siidsi",$title, $categoryid, $colorid, $price, $description, $id);

      try{
         $stmt->execute();
      } catch (Exception $e){
         echo $e->getMessage();
      }
      $stmt->close(); 
      $conn->close(); 
      echo '<br>Product has been updated<br>';
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