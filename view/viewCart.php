

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
         <td><div style="height:50px; width:50px">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="<?= $product->getTitle() ?>" style="width:100%; max-height: 100%">
         </div></td>
         <td><?= $product->getTitle() ?></td>
         <td><?= $product->getColor() ?></td>
         <td><?= $product->getPrice() ?></td>
         <td><?= $qty ?></td>
         <td><?= $qty * $product->getPrice() ?></td>
         <td> <input type="submit" name="edit" value="✏️" style="background:none;"></input></td>
         <td> <input type="submit" name="delete" value="♻️" style="background:none;"></input></td>
      </tr>  
      </form>

      <?php  $total += $qty * $product->getPrice(); }  ?>
   </tbody>
   <tfoot>
      <tr>
         <td>SUM</td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td><?= $total ?></td>
         <td></td>
         <td></td>
      </tr>
   </tfoot>
</table>
<button>
   <a href="view/viewAllProducts.php">Buy More Stuff</a>
</button>
<button>
   <a href="view/viewNewOrExistingCust.php">Checkout 💸</a>
</button>