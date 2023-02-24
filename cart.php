<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
<link rel="stylesheet" href="css/main.css">
<?php
session_start();
require('classes/classDBClasses.php');

if(isset($_POST['edit']) && ($_POST['edit'] == "✏️")){
   include('view/viewEditCart.php');
}
if(isset($_POST['minus']) && ($_POST['minus'] == "➖")){
   if($_SESSION['qty'] != 1){
      $_SESSION['qty']--;
   } 
   include('view/viewEditCart.php');
}
if(isset($_POST['plus']) && ($_POST['plus'] == "➕")){
   $_SESSION['qty']++;
   include('view/viewEditCart.php');
}
if(isset($_POST['done']) && ($_POST['done'] == "✅")){
   $_SESSION['cart'][$_SESSION['id']] = (int)$_SESSION['qty'];
   echo 'Cart updated 👍';
}
if(isset($_POST['delete']) && ($_POST['delete'] == "♻️")){
   unset($_SESSION['cart'][$_POST['id']]);
}
echo '<br><br><br><br>';
require('view/viewCart.php');

?>

