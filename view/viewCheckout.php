<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:../index.php');
  };
?>

<h2>Stuff ordered</h2>
<table class="cart-table">
<thead>
   <tr>
      <th scope="col">Order nr</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Color</th>  
      <th scope="col">Price</th>       
      <th scope="col">Quantity</th>   
      <th scope="col">Total</th>   
   </tr>
</thead>
<tbody>  
   <?php 
   $total = 0 ;
   foreach($orderdetail as $order){ 
   $product = Product::getProduct($order->getProductid());
   $image = $product->getImage();
   ?>  
   
   <tr>
      <td><?= $orderid ?></td>
      <td><div style="height:50px; width:50px; margin:0 auto;">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="<?= $product->getTitle() ?>" style="width:100%; max-height: 100%">
         </div></td>
      <td><?= ucfirst($order->getTitle()) ?></td>
      <td><?= ucfirst($order->getColor()) ?></td>
      <td><?= $product->getPrice() ?></td>
      <td><?= $order->getQuantity()  ?></td>
      <td><?= $order->getQuantity() * $product->getPrice() ?></td>
   </tr>
   <br>
   <?php $total += $order->getQuantity() * $product->getPrice(); } ?>    
   <tr>
      <td><b>Your total</b></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><b><?= $total ?></b></td>
   </tr>
</tbody>
</table>
<button style="width:100%">
   <a href=".">Buy More Stuff</a>
</button>

