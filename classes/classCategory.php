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

   public function getCategoryname(){
     return $this->categoryname;
   }
   public function getCategoryid(){
      return $this->categoryid;
   }
}