<?php
session_start();
require('./classes/classDBClasses.php');
include('./view/header.php');

// datawash, but also a way of controlling that they are ints
$searchword = DataWash::testInput(filter_input(INPUT_GET, 'search', FILTER_UNSAFE_RAW));
$categoryid = filter_input(INPUT_GET,'categoryid',FILTER_VALIDATE_INT);
$colorid = filter_input(INPUT_GET,'colorid',FILTER_VALIDATE_INT);
$productid = filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);

// if a product is selected, product with same style but different colors and if the product has extra image is fetched and displayed with the product
if($productid){
   $product = Product::getProduct($productid);
   $othercolors = Image::getOtherColorsForProduct($product->getTitle());
   $extraimages = Image::getExtraImages($productid);
   $_SESSION["product"] = $product->getProductid();
   include('./view/viewProduct.php');
} else { 

   //Searchbar is populated with colors and categories
   $colors = Color::getAllColors();
   $categories = Category::getAllCategories(); 
   //If all or any selection from searchbar is given products thoose are retreived
   if($searchword || $categoryid || $colorid){
      $products = Product::getSearchedProducts($searchword, $categoryid, $colorid);
   } else {
      $products = Product::getAllProducts();
   }

   // All or searched/filtered products are displayed
   include('./view/viewAllProducts.php');
   if(empty($products)){
      echo "<h2>No matches found.</h2><br><button><a class=\"index-button\" href=\".\">View all products</a></button>";
   } 
}

include('./view/footer.php');
?>
