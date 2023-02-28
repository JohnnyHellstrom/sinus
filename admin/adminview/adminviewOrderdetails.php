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
   <tr>  
   <?php foreach($orderdetail as $order){ ?>   
   <tr>
      <td><?= $order->getTitle() ?></td>
      <td><?= $order->getProductid() ?></td>
      <td><?= $order->getColor() ?></td>
      <td><?= $order->getQuantity() ?></td>
   </tr>

</form>
<?php } ?>    
          
   </tr>  
   </form>
</tbody>
</table>