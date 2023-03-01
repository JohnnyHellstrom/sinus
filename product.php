<?php
session_start();

if(isset($_SESSION["cart"])){
   if(array_key_exists($_SESSION["product"], $_SESSION["cart"])){
      $_SESSION["cart"][$_SESSION["product"]] += (int)$_POST['quantity'];
   } else {
      $_SESSION["cart"] += array($_SESSION["product"] => (int)$_POST['quantity']);
   }
} else {
   $_SESSION["cart"] = array($_SESSION["product"] => (int)$_POST['quantity']);
}

header("location:./index.php");
?>