<?php
//require('classDB.php');

class Image{

   public static function addImage($imgContent, $id){

      // Insert image content into database 
      $conn = DB::connect();
      $insert = $conn->query("INSERT INTO images (image, productid) VALUES ('$imgContent', '$id')"); 
      
      if($insert){ 
         echo "File uploaded successfully."; 
      } else { 
         echo "File upload failed, please try again."; 
      }  

   }
   public static function updateImage($image, $id){
      $conn = DB::connect();
      $update = $conn->query("UPDATE images SET image = '$image' WHERE productid = '$id'");
      if($update){
         echo "Image updated successfully."; 
      } else { 
         echo "Image updated failed, please try again."; 
      }    
   }
}