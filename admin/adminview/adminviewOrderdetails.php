<?php
$orderdetail = Order::getOrdersDetails($orderid);

echo '<pre>';
print_r($_POST['orderid']);
echo '</pre>';

echo '<pre>';
print_r( $orderdetail);
echo '</pre>';

echo '<pre>';

var_dump($orderid);
echo '</pre>';


?>

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
          
   </tr>  
   </form>
</tbody>
</table>