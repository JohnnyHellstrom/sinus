<?php
$product = Product::getProduct($_POST['id']);
?>

<fieldset>
  <legend>Update Product</legend>
  <form action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" method="post">
  <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
    <label for="title">Product Name:</label>
    <input type="text" name="title" value="<?= $product->getTitle() ?>" required>

    <label for="category">Category:</label>
    <input type="text" name="category" value="<?= $product->getCategory() ?>" required>

    <label for="color">Color:</label>
    <input type="text" name="color" value="<?= $product->getColor() ?>" required>
    
    <label for="price">Price:</label>
    <input type="text" name="price" value="<?= $product->getPrice() ?>" required>

    <label for="description">Description:</label>
    <textarea rows="4" cols="50" name="description" required><?= $product->getDescription() ?></textarea>

    <div style="height:50px; width:50px">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product->getImage()); ?>" alt="<?= $product->getTitle() ?>" style="width:100%; max-height: 100%">
    </div>

    <label>Select Image File:</label>
    <input type="hidden" name="action" value="addimage">
    <input type="file" name="image">

    <button>Update</button>       
  </form>

</fieldset>