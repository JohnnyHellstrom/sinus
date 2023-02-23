<?php
require('classDB.php');

class Image{

   public static function addImage($imgContent, $id){
      $status = $statusMsg = ''; 

            // Insert image content into database 
            $conn = DB::connect();
            $insert = $conn->query("INSERT INTO images (image, productid) VALUES ('$imgContent', '$id')"); 
            
            if($insert){ 
               $status = 'success'; 
               $statusMsg = "File uploaded successfully."; 
            } else { 
               $statusMsg = "File upload failed, please try again."; 
            }  

   }
}