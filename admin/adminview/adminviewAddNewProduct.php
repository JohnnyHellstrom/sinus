<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:../index.php');
  };
?>
<fieldset>
  <legend>Add Product</legend>
  <form action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" method="post">
    <label for="title">Product Name:</label>
    <input type="text" name="title" required>
    <label for="categoryid">Category:</label>
    <select name="categoryid" id="categoryid" required>
      <?php foreach($categories as $category){  ?>
      <option value="<?= $category->getCategoryid() ?>"><?= ucfirst($category->getCategoryname()) ?></option>
      <?php } ?>
    </select>
    <label for="colorid">Color:</label>
    <select name="colorid" id="colorid" required>
      <?php foreach($colors as $color){  ?>
      <option value="<?= $color->getColorid() ?>"><?= ucfirst($color->getColorname()) ?></option>
      <?php } ?>
    </select>    
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

<fieldset>
  <legend>Add Color</legend>
  <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
    <label for="color">Color:</label>
    <input type="text" name="color">
    <button>Add</button>
  </form>
</fieldset>

<fieldset>
  <legend>Add Category</legend>
  <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
    <label for="category">Category:</label>
    <input type="text" name="category">
    <button>Add</button>
  </form>
</fieldset>
