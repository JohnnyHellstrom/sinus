<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:../index.php');
  };
?>
<h2>All Customers:</h2>
<table class="cart-table">
<thead>
   <tr>
      <th scope="col">Customernumber</th>
      <th scope="col">Name</th>   
      <th scope="col">More info</th>   
   </tr>
</thead>
<tbody>      
   <?php foreach($allcustomers as $customer){ ?>   
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
         <input type="hidden" name="mail" value="<?= $customer->getEmail() ?>">
         <tr>
            <td><?= $customer->getCustomerId() ?></td>
            <td><?= $customer->getFirstName() . " " . $customer->getLastName() ?></td>
            <td><input class="table-input-center" type="submit" name="custdetails" value="🔍" style="background:none;"></input></td>
         </tr>
      </form>

   <?php } ?>    
          
</tbody>
</table>