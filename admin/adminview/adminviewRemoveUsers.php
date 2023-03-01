<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:../index.php');
  };
?>
<h2>Remove a User:</h2>
<table class="cart-table">
<thead>
   <tr>
      <th scope="col">UserID</th>
      <th scope="col">username</th>
      <th scope="col">edit</th>
   </tr>
</thead>
<tbody>
   <?php foreach ($users as $user) { ?>
      
   <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
   <input type="hidden" name="id" value="<?= $user->getUserid() ?>">
   <tr>
      <td><?= $user->getUserid() ?></td>      
      <td><?= $user->getUsername() ?></td>
      <td>        
        <input class="table-input-center" type="submit" name="edit" value="✏️" style="background:none;"></input>      
      </td>
   </tr>  
   </form>

   <?php  }  ?>
</tbody>
</table>