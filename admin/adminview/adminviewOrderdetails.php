<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:../index.php');
  };
?>
<h2>Viewing Order number: <?= $orderid?></h2>

<table class="cart-table">
<thead>
   <tr>
      <th scope="col">Title</th>
      <th scope="col">Productid</th>
      <th scope="col">Color</th>      
      <th scope="col">Quantity</th>   
   </tr>
</thead>
<tbody>      
   <?php foreach($orderdetail as $order){ ?>   
   <tr>
      <td><?= ucfirst($order->getTitle()) ?></td>
      <td><?= $order->getProductid() ?></td>
      <td><?= ucfirst($order->getColor()) ?></td>
      <td><?= $order->getQuantity() ?></td>
   </tr>

   <?php } ?>    
          
</tbody>
</table>