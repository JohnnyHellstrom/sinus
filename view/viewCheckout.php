<h1>Stuff ordered</h1>

<h2> Order number: <?= $orderid?></h2>
<table class="cart-table">
<thead>
   <tr>
      <th scope="col">Title</th>
      <th scope="col">Color</th>      
      <th scope="col">Quantity</th>   
   </tr>
</thead>
<tbody>      
   <?php foreach($orderdetail as $order){ ?>   
   <tr>
      <td><?= $order->getTitle() ?></td>
      <td><?= $order->getColor() ?></td>
      <td><?= $order->getQuantity() ?></td>
   </tr>

   <?php } ?>    
          
</tbody>
</table>
<button>
   <a href=".">Buy More Stuff</a>
</button>