<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:../index.php');
  };
?>
<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/adminheader.css">
   <link rel="icon" href="../images/sinus-logo-symbol - small.png"> 
   <title>Sinus Webshop - Admin View</title>
</head>
<header>
   <img src="../images/sinus-logo-landscape -  small.png" alt="logo">
   <h1>Admin - Sinus Webshop</h1>
   <img src="../images/sinus-logo-landscape -  small.png" alt="logo">
</header>

<nav class="admin-nav">
   <button class="admin-header-button">
      <a href=".">Go to adminindex</a>
   </button>
   <button class="admin-header-button">
      <a href="./adminAddProduct.php">Add Product</a>
   </button>
   <button class="admin-header-button">
      <a href="./adminUpdateProduct.php">See/Update Products</a>
   </button>
   <button class="admin-header-button">
      <a href="./adminOrders.php">Overview Orders</a>
   </button>
   <button class="admin-header-button">
      <a href="./adminCustomers.php">View Customers</a>
   </button>
   <button class="admin-header-button">
      <a href="./adminSignup.php">Add another user</a>
   </button>
   <button class="admin-header-button">
      <a href="./adminRemove.php">Remove a user</a>
   </button>
   <form action="." method="post" style="display:inline-block">
      <input type="hidden" name="logout">
      <button class="admin-header-button">Log out</button>
   </form>
</nav>

