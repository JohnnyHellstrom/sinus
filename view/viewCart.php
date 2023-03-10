<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:../index.php');
  };
?>

   <table class="cart-table">
   <thead>
      <tr>
      <th scope="col">Image</th>
         <th scope="col">Product</th>
         <th scope="col">Color</th>
         <th scope="col">Price</th>
         <th scope="col">Quantity</th>
         <th scope="col">Total</th>
         <th scope="col">Edit</th>
         <th scope="col">Remove</th>
      </tr>
   </thead>
   <tbody>
      <?php 
         $total = 0;
         foreach ($_SESSION['cart'] as $id => $qty) {
         $product = Product::getProduct($id);
         $image = $product->getImage();
      ?>
      <form action="<?php $_SERVER['PHP_SELF']?>"method="post">
      <input type="hidden" name="id" value="<?= $id ?>">
      <input type="hidden" name="qty" value="<?= $qty ?>">
      <tr>
         <td><div style="height:50px; width:50px; margin:0 auto;">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="<?= $product->getTitle() ?>" style="width:100%; max-height: 100%">
         </div></td>
         <td><?= ucfirst($product->getTitle()) ?></td>
         <td><?= ucfirst($product->getColor()) ?></td>
         <td><?= $product->getPrice() ?></td>
         <td><?= $qty ?></td>
         <td><?= $qty * $product->getPrice() ?></td>
         <td> <input type="submit" name="edit" value="✏️" style="background:none; margin:0 auto;"></input></td>
         <td> <input type="submit" name="delete" value="♻️" style="background:none; margin:0 auto;"></input></td>
      </tr>  
      </form>

      <?php  $total += $qty * $product->getPrice(); }  ?>
   </tbody>
   <tfoot>
      <tr>
         <td><b>Your total</b></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td><b><?= $total ?></b></td>
         <td></td>
         <td></td>
      </tr>
   </tfoot>
</table>
<button>
   <a class="cart-a" href=".">Buy More Stuff</a>
</button>
<button>
   <a class="cart-a" href="./customerinfo.php">💸 Checkout</a>
</button>