<?php
include('adminheader.php');
require('../../classes/classProducts.php');

?>

<fieldset>
  <legend>Add Product</legend>
  <form action="../adminAddProduct.php" enctype="multipart/form-data" method="post">

    <label for="title">Product Name:</label>
    <input type="text" name="title" required>

    <label for="category">Category:</label>
    <input type="text" name="category" required>

    <label for="color">Color:</label>
    <input type="text" name="color" required>
    
    <label for="price">Price:</label>
    <input type="text" name="price"  required>

    <label for="description">Description:</label>
    <textarea rows="4" cols="50" name="description" required></textarea>

    <label>Select Image File:</label>
    <input type="hidden" name="action" value="addimage">
    <input type="file" name="image">

    <button>Add</button>       
  </form>

</fieldset>