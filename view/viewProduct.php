<link rel="stylesheet" href="../css/viewproduct.css">
<?php
session_start();
require('../classes/classDBClasses.php');
include('header.php');

$productid = (int)filter_input(INPUT_POST,'id',FILTER_UNSAFE_RAW);
$product = Product::getProduct($productid);
$_SESSION["product"] = (int)$product->getProductid();
//echo '<pre>'; var_dump($_SESSION['cart']); echo '</pre>';
?>

<section class="displayproduct">

   <?php
   $id = $product->getProductid();
   $title = $product->getTitle();
   $color = $product->getColor();
   $price = $product->getPrice(); 
   $description = $product->getDescription();
   $image = $product->getImage();
   ?>

   <form action="../product.php" method="post">  
      <input type="hidden" value="buy">  
      <div class="product-container">
         <div>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="<?= $title ?>" style="max-width:100%; max-height: 100%">
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
      </div>
   </form>


   
</section>
<?php
include('footer.php');