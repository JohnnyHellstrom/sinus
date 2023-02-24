<?php 
session_start();
require('../classes/classDBClasses.php');

include('header.php');

$products = Product::getAllProducts();

?>
<main>
<section class="product-cards">

      <?php
      foreach ($products as $product) { 
      $id = $product->getProductid();
      $title = $product->getTitle();
      $color = $product->getColor();
      $price = $product->getPrice(); 
      $image = $product->getImage();
      ?>
      <form action="viewProduct.php" method="post">
         <input type="hidden" name="id" value="<?= $id ?>">    
         <div class="card">
            <div class="image-container"> 
               <input type="image" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="submit" style="width:100%; max-height: 100%">
            </div>
            <h3><?= $title ?></h3>
            <p><?= $price . " " ?>kr</p>
            <p><?= $color ?></p>
         </div>
      </form>
      <?php } ?>
   
</section>

</main>
<?php

include('footer.php');