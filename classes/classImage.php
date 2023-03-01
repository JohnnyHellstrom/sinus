<?php

class Image{
   private $productid;
   private $image;
   private $extraimageid;


   public function __construct($productid, $image, $extraimageid = null){
      $this->productid = $productid;
      $this->image = $image;
      $this->extraimageid = $extraimageid;

   }
   public static function getExtraImages($id){
      $conn = DB::connect();

      $result = $conn->query("SELECT * FROM extraimages WHERE productid = $id");

      $extraimages = array();

      if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
            $image = new Image($row['productid'], $row['image'], $row['extraimagesid']);
            $extraimages[] = $image;     
         }
      } 
      $conn->close();
      return $extraimages;
      
   }

   public static function addExtraImage($imgContent, $id){
      // Insert image content into database 
      $conn = DB::connect();
      $insert = $conn->query("INSERT INTO extraimages (image, productid) VALUES ('$imgContent', '$id')"); 
      
      if($insert){ 
         echo "File uploaded successfully."; 
      } else { 
         echo "File upload failed, please try again."; 
      }  
      $conn->close();  
   }
   public static function getExtraImage($extraimageid){
      $conn = DB::connect();
      $result = $conn->query("SELECT image FROM extraimages WHERE extraimagesid = $extraimageid");
      $row = $result->fetch_assoc();
      $conn->close();
      return $row['image'];
   }

   public static function addImage($imgContent, $id){

      // Insert image content into database 
      $conn = DB::connect();
      $insert = $conn->query("INSERT INTO images (image, productid) VALUES ('$imgContent', '$id')"); 
      
      if($insert){ 
         echo "<br>Image uploaded successfully."; 
      } else { 
         echo "<br>Image upload failed, please try again."; 
      }
      $conn->close();  

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
   public static function getOtherColorsForProduct($title){
      $conn = DB::connect();
   
      $sql = "SELECT i.productid, i.image
      FROM images i
      JOIN products p ON i.productid = p.productid
      WHERE p.title = ?";

      $stmt = $conn->prepare($sql);
      $stmt->bind_param('s',$title);

      $stmt->execute();
      $result = $stmt->get_result();

      $images = array();

      if ($result->num_rows > 0) {
        
         while($row = $result->fetch_assoc()) {
            $images[] = new Image($row['productid'], $row['image']); 
         }
      }

      $stmt->close();
      $conn->close();
      return $images;
   
   }
   public function getImage(){
      return $this->image;
   }
   public function getProductid(){
      return $this->productid;
   }
   public function getExtraImageId(){
      return $this->extraimageid;
   }
}