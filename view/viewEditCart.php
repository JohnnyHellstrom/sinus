<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
  header('location:../index.php');
};

if(isset($_POST['edit']) && ($_POST['edit'] == "✏️")){
   $_SESSION['id'] = $_POST['id'];
   $_SESSION['qty'] = $_POST['qty'];
}
$product = Product::getProduct($_SESSION['id']);
$image = $product->getImage();

?>
<h2>Edit Cart</h2>
   <table class="cart-table">
      <thead>
         <tr>
            <th scope="col">Image</th>
               <th scope="col">Product</th>
            <th scope="col">Color</th>
            <th scope="col"></th>
            <th scope="col">Quantity</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
         </tr>
      </thead>
      <tbody>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
         <tr>
            <td><div style="height:50px; width:50px; margin:0 auto; ">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="<?= $product->getTitle() ?>" style="width:100%; max-height: 100%">
            </div></td>
            <td><?= $product->getTitle() ?></td>
            <td><?= $product->getColor() ?></td>
            <td><input type="submit" name="minus" value="➖" style="background:none; margin:0 0 0 auto;"></input></td>
            <td><?= $_SESSION['qty'] ?></td>
            <td><input type="submit" name="plus" value="➕" style="background:none;"></input></td>
            <td></td>
            <td><input type="submit" name="done" value="✅" style="background:none; margin:0 auto;"></input></td>
         </tr>
      </form>
      </tbody>

</table>
