<?php
session_start();


// unset($_SESSION);
// session_destroy();

if(isset($_SESSION["cart"])){
   if(array_key_exists($_SESSION["product"], $_SESSION["cart"])){
      $_SESSION["cart"][$_SESSION["product"]] += (int)$_POST['quantity'];
   } else {
      $_SESSION["cart"] += array($_SESSION["product"] => (int)$_POST['quantity']);
   }
} else {
   $_SESSION["cart"] = array($_SESSION["product"] => (int)$_POST['quantity']);
}

include('view/header.php');
// echo '<pre>';
// var_dump($_SESSION["cart"]);
// echo '</pre>';
?>
<a href="Cart.php">Cart</a>
<a href=".">All products</a>

<?php 
include('view/footer.php');