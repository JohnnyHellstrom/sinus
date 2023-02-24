<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
<link rel="stylesheet" href="../css/header.css">
<?php
//get number of items in cart
$counter = 0;
if (isset( $_SESSION['cart'])){
$counter = count($_SESSION['cart']);
}

?>
   <header>
   <a href="../view/viewAllProducts.php" class="image"><img src="../images/sinus-logo-landscape -  small.png"></a>
      <h1>Sinus Skate and Apperal Shop</h1>
      <div class="cart">
        <a href="../cart.php"> 🛒 </a>
        <!-- Whole counter div clickable -->
        <a href="../cart.php">
        <div class="counter">
         <p><?= $counter ?></p>
        </div>
        </a>

      </div>
   </header>