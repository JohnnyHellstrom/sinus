<?php
require('../classes/classDataWash.php');
require('../classes/classProducts.php');

$title = DataWash::testInput(filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW)); 
$category = DataWash::testInput(filter_input(INPUT_POST, 'category', FILTER_UNSAFE_RAW)); 
$color = DataWash::testInput(filter_input(INPUT_POST, 'color', FILTER_UNSAFE_RAW)); 
$price = DataWash::testInput(filter_input(INPUT_POST, 'price', FILTER_UNSAFE_RAW)); 
$description = DataWash::testInput(filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW)); 

$produkt = new Product(0, $title, $category, $color, $price, $description);
$id = Product::addProduct($produkt);



// Check image and insert image and productid to imagetable.
if(!empty($_FILES["image"]["name"])) { 
   // Get file info 
   $fileName = basename($_FILES["image"]["name"]); 
   $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    
   // Allow certain file formats 
   $allowTypes = array('jpg','png','jpeg','gif'); 
   if(in_array($fileType, $allowTypes)){ 
      $image = $_FILES['image']['tmp_name']; 
      $imgContent = addslashes(file_get_contents($image)); 
      $id = $_POST['id'];
      Image::addImage($imgContent, $id);

   } else { 
      echo 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
   } 
} 
