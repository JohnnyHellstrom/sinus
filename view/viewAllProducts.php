<?php 
require('../classes/classProducts.php');
include('header.php');

$products = Product::getAllProducts();

?>
<section class="product-cards">

      <?php
      foreach ($products as $product) { 
      $id = $product->getProductid();
      $title = $product->getTitle();
      $color = $product->getColor();
      $price = $product->getPrice(); 
      ?>
      <form action="viewProduct.php" method="post">
         <input type="hidden" name="id" value="<?= $id ?>">    
         <div class="card">
            <div class="image-container"> 
               <input type="image" src="../images/hoodie-ash.png" alt="submit" style="width:100%; max-height: 100%">
            </div>
            <h3><?= $title ?></h3>
            <p><?= $price . " " ?>kr</p>
            <p><?= $color ?></p>
         </div>
      </form>
      <?php } ?>
   
</section>




<?php

include('footer.php');