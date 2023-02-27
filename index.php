<?php
session_start();
require('classes/classDBClasses.php');
include('view/header.php');


$searchword = DataWash::testInput(filter_input(INPUT_GET, 'search', FILTER_UNSAFE_RAW));
$categoryid = filter_input(INPUT_GET,'categoryid',FILTER_VALIDATE_INT);
$colorid = filter_input(INPUT_GET,'colorid',FILTER_VALIDATE_INT);

$productid = filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);

if($productid){
   $product = Product::getProduct($productid);
   $othercolors = Image::getOtherColorsForProduct($product->getTitle());
   $_SESSION["product"] = $product->getProductid();
   include('view/viewProduct.php');
} else { 

   $colors = Color::getAllColors();
   $categories = Category::getAllCategories(); 

   if($searchword || $categoryid || $colorid){
      $products = Product::getSearchedProducts($searchword, $categoryid, $colorid);
   } else {
      $products = Product::getAllProducts();
   }
   include('view/viewAllProducts.php');
}




include('view/footer.php');
?>
