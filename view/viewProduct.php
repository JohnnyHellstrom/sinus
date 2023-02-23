<?php
session_start();
require('../classes/classProducts.php');
include('header.php');

$productid = (int)filter_input(INPUT_POST,'id',FILTER_UNSAFE_RAW);
$product = Product::getProduct($productid);
$_SESSION["product"] = (int)$product->getProductid();
echo '<pre>'; var_dump($_SESSION['cart']); echo '</pre>';
?>

<section class="displayproduct">

   <?php
   $id = $product->getProductid();
   $title = $product->getTitle();
   $color = $product->getColor();
   $price = $product->getPrice(); 
   $description = $product->getDescription();
   ?>

   <form action="../product.php" method="post">  
      <input type="hidden" value="buy">  
      <div class="product-container">
         <div>
            <img src="../images/hoodie-ash.png" alt="<?= $title ?>" style="width:100%; max-height: 100%">
         </div>
      </div>
     <h3><?= $title ?></h3>
      <p><?= $description ?></p>
      <p><?= $price . " " ?>kr</p>
      <p><?= $color ?></p>  
      <label for="quantity">Qty:</label>
      <select name="quantity" id="quantity">
         <?php for ($i=1;$i<=10;$i++){?>
         <option value="<?= $i ?>"><?= $i ?></option>
         <?php } ?>
      </select>
      <button>Add to Cart 🛒</button>
   </form>


   
</section>
<?php
include('footer.php');