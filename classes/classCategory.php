<?php

class Category{
   private  $categoryid;
   private  $categoryname;

   public function __construct($categoryid, $categoryname){
      $this->categoryid = $categoryid;
      $this->categoryname = $categoryname;
   }

   public static function getAllCategories(){
      $conn = DB::connect();

      $result = $conn->query("SELECT * FROM categories");

      if($result->num_rows > 0){
         while($row = $result->fetch_assoc()){
            $category = new Category($row['categoryid'],$row['categoryname']);
            $categorys[] = $category;
         }
      } else {
         echo 'No categorys in database';
      }
      $conn->close();
      return $categorys;
   }
   public static function InsertNewCategory($category){
      $conn = DB::connect();

      $stmt = $conn->prepare("INSERT INTO categories (categoryname) VALUES (?)");
      $stmt->bind_param('s', $category);
      try{
         $stmt->execute();
      } catch (exception $e) {
         echo $e->getMessage();
      }
      $stmt->close();
      $conn->close();
   }

   public function getCategoryname(){
     return $this->categoryname;
   }
   public function getCategoryid(){
      return $this->categoryid;
   }
}