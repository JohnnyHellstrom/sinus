<?php
$product = Product::getProduct($_POST['id']);
$colors = Color::getAllColors();
$categories = Category::getAllCategories();
?>

<fieldset>
  <legend>Update Product</legend>
  <form action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" method="post">

    <input type="hidden" name="updateid" value="<?= $_POST['id'] ?>">

    <label for="title">Product Name:</label>
    <input type="text" name="title" value="<?= $product->getTitle() ?>" required>

    <label for="categoryid">Category:</label>
    <select name="categoryid" id="categoryid">
        <?php foreach($categories as $category){ ?>
          <option value="<?= $category->getCategoryid(); ?>"
          <?php if($category->getCategoryname() == $product->getCategory()){ ?> selected <?php } ?>> 
            <?= $category->getCategoryname(); ?>
        </option>
        <?php } ?>
    </select>

    <label for="colorid">Color:</label>
    <select name="colorid" id="colorid">
      <?php foreach($colors as $color){ ?>
        <option value="<?= $color->getColorid() ?>"
        <?php if($color->getColorname() == $product->getColor()){ ?> selected <?php } ?>>
            <?= $color->getColorname(); ?>
        </option>
        <?php } ?>
    </select>
    
    <label for="price">Price:</label>
    <input type="text" name="price" value="<?= $product->getPrice() ?>" required>

    <label for="description">Description:</label>
    <textarea rows="4" cols="50" name="description" required><?= $product->getDescription() ?></textarea>

    <div style="height:50px; width:50px">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product->getImage()); ?>" alt="<?= $product->getTitle() ?>" style="width:100%; max-height: 100%">
    </div>

    <label>ADD IMAGE AND CREATE DUPLICATE VIEW OF A PRODUCT:</label>
    <input type="hidden" name="action" value="addimage">
    <input type="file" name="image">
    <button>Update</button>       
  </form>

</fieldset>