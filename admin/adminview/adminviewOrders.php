<h2>All Orders:</h2>
<table>
   <thead>
      <tr>
         <th scope="col">Ordernumber</th>
         <th scope="col">Orderdate</th>
         <th scope="col">Shipped</th>
         <th scope="col">See Orderdetails</th>
      </tr>
   </thead>
   <tbody>
   <?php foreach($orders as $order){ ?>

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      
      <?php $orderdate = $order->getOrderdate()
         ?>        
         <input type="hidden" name="orderid" value="<?= $order->getOrderid() ?>">
         <tr>
            <td><?= $order->getOrderid() ?></td>
            <td><?= $orderdate->format('Y-m-d H:i') ?></td>
            <td><?= $order->getShipped() ?></td>
            <td><input type="submit" name="orderdetails" value="🔍" style="background:none;"></input></td>
         </tr>
     
      </form>
      <?php } ?>
   </tbody>
</table>