<?php

include('./adminSecurity.php');
require('../classes/classDBClasses.php');
include('./adminview/adminheader.php');

$id = DataWash::testInput(filter_input(INPUT_POST, 'updateid', FILTER_VALIDATE_INT)); 
$title = DataWash::testInput(filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW)); 
$categoryid = DataWash::testInput(filter_input(INPUT_POST, 'categoryid', FILTER_VALIDATE_INT)); 
$colorid = DataWash::testInput(filter_input(INPUT_POST, 'colorid', FILTER_VALIDATE_INT)); 
$price = DataWash::testInput(filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT)); 
$description = DataWash::testInput(filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW)); 

if($id && $title && $categoryid && $colorid && $price && $description){
   $alteredproduct = new Product($id, $title, $categoryid, $colorid, $price, $description);
   Product::updateProduct($alteredproduct);   
} 

//Check if image is valid and inserts
if(!empty($_FILES["image"]["name"])) { 
   // Get file info 
   $fileName = basename($_FILES["image"]["name"]); 
   $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    
   // Allow certain file formats 
   $allowTypes = array('jpg','png','jpeg','gif'); 
   if(in_array($fileType, $allowTypes)){ 
      $image = $_FILES['image']['tmp_name']; 
      $imgContent = addslashes(file_get_contents($image)); 
      if($_POST['action'] == 'updateimage'){
         Image::updateImage($imgContent, $id);
      } elseif ($_POST['action'] == 'addimage'){
         Image::addExtraImage($imgContent, $id);
      }

   } else { 
      echo 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
   } 
} 
//Displays one product if selected else all products
if(isset($_POST['edit'])){
   $product = Product::getProduct($_POST['id']);
   $colors = Color::getAllColors();
   $categories = Category::getAllCategories();
   include('./adminview/adminviewUpdateProduct.php');
} else {
   $products = Product::getAllProducts();
   include('./adminview/adminviewAllProducts.php');
}
