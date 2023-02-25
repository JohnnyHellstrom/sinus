
<!-- MAYBE DELETE FILE - ALOT O DB CALLS, SESSION or BRAINPOWER TO MAKE IT USEFUL -->

<fieldset>
   <legend>Updated product</legend>
<table class="cart-table">
<thead>
   <tr>
   <th scope="col">Image</th>
      <th scope="col">Product</th>
      <th scope="col">Color</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">Edit</th>
      <th scope="col">Confirm</th>
   </tr>
</thead>
<tbody>     
   <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
   <input type="hidden" name="id" value="<?= $alteredproduct->getProductid() ?>">
   <tr>
      <td>BILD</td>
      <td><?= $alteredproduct->getTitle() ?></td>
      <td><?= $alteredproduct->getColor() ?></td>
      <td><?= $alteredproduct->getCategory() ?></td>
      <td><?= $alteredproduct->getPrice() ?></td>
      <td> <input type="submit" name="edit" value="✏️" style="background:none;"></input></td>
      <td> <input type="submit" name="confirm" value="✅" style="background:none;"></input></td>
   </tr>  
   </form>
</tbody>
</table>
</fieldset>