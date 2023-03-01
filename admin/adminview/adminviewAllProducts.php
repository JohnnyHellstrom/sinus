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
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">Edit</th>
   </tr>
</thead>
<tbody>
   <?php foreach ($products as $product) { ?>
      
   <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
   <input type="hidden" name="id" value="<?= $product->getProductid() ?>">
   <tr>
      <td><div class="table-input-center" style="height:50px; width:50px">
         <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product->getImage()); ?>" alt="<?= $product->getTitle() ?>" style="width:100%; max-height: 100%">
      </div></td>
      <td><?= ucfirst($product->getTitle()) ?></td>
      <td><?= ucfirst($product->getColor()) ?></td>
      <td><?= ucfirst($product->getCategory()) ?></td>
      <td><?= $product->getPrice() ?></td>
      <td> <input class="table-input-center" type="submit" name="edit" value="✏️" style="background:none"></input></td>
   </tr>  
   </form>

   <?php  }  ?>
</tbody>
</table>