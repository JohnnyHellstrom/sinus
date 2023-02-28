
<section class="displayproduct">

<?php
$id = $product->getProductid();
$title = $product->getTitle();
$color = $product->getColor();
$price = $product->getPrice(); 
$description = $product->getDescription();
$image = $product->getImage();
//$extraimages = Image::getExtraImages($id);

?>

<form action="product.php" method="post">  
   <input type="hidden" value="buy">  
   <div class="product-container">
      <div>
         <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="<?= $title ?>" style="max-width:100%; max-height: 100%">
      </div>
   
      <h3><?= ucfirst($title) ?></h3>
      <p><?= $description ?></p>
      <p><?= $price . " " ?>kr</p>
      <p><?= ucfirst($color) ?></p>  
      <label for="quantity">Qty:</label>
      <select name="quantity" id="quantity">
         <?php for ($i=1;$i<=10;$i++){?>
         <option value="<?= $i ?>"><?= $i ?></option>
         <?php } ?>
      </select>
      <button>Add to Cart 🛒</button>
   </div>
</form>

<div class="side-pictures">
   <?php foreach ($othercolors as $other) { 
      $otherid = $other->getProductid();
      $otherimage = $other->getImage();?>
      <form action="." method="post">
      <input type="hidden" name="id" value="<?= $otherid ?>"> 
      <input type="image" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($otherimage); ?>" alt="submit" style="width:100%; max-height: 100%">
      </form>
   <?php } ?>
   </div>


   <div class="extra-images">
   <?php foreach ($extraimages as $extraimage) { 
     $image_data = $extraimage->getImage();
   ?>
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image_data); ?>" alt="extraimage" class="extra-image">
   <?php } ?>
</div>



 
</section>
<?php
