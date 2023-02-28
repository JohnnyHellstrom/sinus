<table class="cart-table">
<thead>
   <tr>
      <th scope="col">Customernumber</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>      
      <th scope="col">More info</th>   
   </tr>
</thead>
<tbody>      
   <?php foreach($allcustomers as $customer){ ?>   
      <form action="">
         <input type="hidden" name="mail" value="<?= $customer->getEmail() ?>">
         <tr>
            <td><?= $customer->getCustomerId() ?></td>
            <td><?= $customer->getFirstName() . " " . $customer->getLastName() ?></td>
            <td><?= $customer->getEmail() ?></td>
            <td><input type="submit" name="custdetails" value="🔍" style="background:none;"></input></td>
         </tr>
      </form>

   <?php } ?>    
          
</tbody>
</table>