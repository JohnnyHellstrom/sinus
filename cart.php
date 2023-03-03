<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
<link rel="stylesheet" href="css/main.css">
<?php
session_start();
require('./classes/classDBClasses.php');
//if cart is not set then go back to index
if(!isset($_SESSION['cart'])){
   header('location: ./index.php');
}
//go to editcart
if(isset($_POST['edit']) && ($_POST['edit'] == "✏️")){
   include('./view/viewEditCart.php');
}
//lets user add or subtract from the quantity of that item, but not less than 1
if(isset($_POST['minus']) && ($_POST['minus'] == "➖")){
   if($_SESSION['qty'] != 1){
      $_SESSION['qty']--;
   } 
   include('./view/viewEditCart.php');
}
if(isset($_POST['plus']) && ($_POST['plus'] == "➕")){
   $_SESSION['qty']++;
   include('./view/viewEditCart.php');
}
//done editing cart
if(isset($_POST['done']) && ($_POST['done'] == "✅")){
   $_SESSION['cart'][$_SESSION['id']] = (int)$_SESSION['qty'];
   echo 'Cart updated 👍';
}
//deletes product from cart
if(isset($_POST['delete']) && ($_POST['delete'] == "♻️")){
   unset($_SESSION['cart'][$_POST['id']]);
}
echo '<br><br><br><br>';
require('./view/viewCart.php');
// displays if you try to login with something in your cart, or if you try to check out with an empty cart.
if(isset($_SESSION['message'])){
   echo '<h2>' . $_SESSION['message'] . '</h2>';
   unset($_SESSION['message']);
}

?>

