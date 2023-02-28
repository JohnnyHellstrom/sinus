<h1>Stuff ordered</h1>

<h2> Order number: <?= $orderid?></h2>
<table class="cart-table">
<thead>
   <tr>
      <th scope="col">Order nr</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Color</th>  
      <th scope="col">Price</th>       
      <th scope="col">Quantity</th>   
   </tr>
</thead>
<tbody>      
   <?php foreach($orderdetail as $order){ 
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
      <td><?= $order->getQuantity() ?></td>
   </tr>

   <?php } ?>    
          
</tbody>
</table>
<button>
   <a href=".">Buy More Stuff</a>
</button>