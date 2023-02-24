

<?php
require('../../classes/classDBClasses.php');
include('adminheader.php');
$products = Product::getAllProducts();
?>


<table class="cart-table">
<thead>
   <tr>
   <th scope="col">Image</th>
      <th scope="col">Product</th>
      <th scope="col">Color</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">Edit</th>
   </tr>
</thead>
<tbody>
   <?php 
      foreach ($products as $product) { 
   ?>
   <form action="adminviewUpdateProduct.php" method="post">
   <input type="hidden" name="id" value="<?= $product->getProductid() ?>">
   <tr>
      <td><div style="height:50px; width:50px">
         <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product->getImage()); ?>" alt="<?= $product->getTitle() ?>" style="width:100%; max-height: 100%">
      </div></td>
      <td><?= $product->getTitle() ?></td>
      <td><?= $product->getColor() ?></td>
      <td><?= $product->getCategory() ?></td>
      <td><?= $product->getPrice() ?></td>
      <td> <input type="submit" name="edit" value="✏️" style="background:none;"></input></td>
   </tr>  
   </form>

   <?php  }  ?>
</tbody>
</table>