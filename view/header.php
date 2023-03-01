<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
   <link rel="stylesheet" href="./css/header.css">
   <link rel="stylesheet" href="./css/viewproduct.css">
   <link rel="stylesheet" href="./css/main.css">
   <title>Sinus Webshop</title>
   <link rel="icon" href="./images/sinus-logo-symbol - small.png">
</head>


<?php
//get number of items in cart
$counter = 0;
if (isset( $_SESSION['cart'])){
$counter = count($_SESSION['cart']);
}

?>
   <header>
   <a href="." class="image"><img src="images/sinus-logo-landscape -  small.png"></a>
      <h1>Sinus Skate and Apperal Shop</h1>
      <div class="cart">
        <a href="cart.php"> 🛒 </a>
        <!-- Whole counter div clickable -->
        <?php if($counter !=0) : ?>
        <a href="cart.php">
        <div class="counter">
         <p><?= $counter ?></p>
        </div>
        </a>
        <?php endif; ?>

      </div>
   </header>