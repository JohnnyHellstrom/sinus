<?php
require('../classes/classImage.php');

$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW); 
$title = filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW); 
$category = filter_input(INPUT_POST, 'category', FILTER_UNSAFE_RAW); 
$color = filter_input(INPUT_POST, 'color', FILTER_UNSAFE_RAW); 
$price = filter_input(INPUT_POST, 'price', FILTER_UNSAFE_RAW); 
$description = filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW); 


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
