<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:../index.php');
  };
?>

<section>
   <form class="search-form" action="<?= $_SERVER['PHP_SELF'] ?>" method="get" >
      <label class="display-inline" for="search">Search </label>
      <input class="display-inline" type="text" name="search">
      <label class="display-inline" for="categoryid">Category:</label>
      <select class="display-inline" name="categoryid" id="categoryid">
         <option selected value="">None</option>
         <?php foreach($categories as $category){  ?>
         <option value="<?= $category->getCategoryid() ?>"><?= ucfirst($category->getCategoryname()) ?></option>
         <?php } ?>
      </select>
      <label class="display-inline" for="colorid">Color:</label>
      <select class="display-inline" name="colorid" id="colorid">
         <option selected value="">None</option>
         <?php foreach($colors as $color){  ?>
         <option value="<?= $color->getColorid() ?>"><?= ucfirst($color->getColorname()) ?></option>
         <?php } ?>
      </select>
      <button class="display-inline">Search 🔍</button>
   </form>
</section>

<section class="product-cards">
      <?php
      foreach ($products as $product) { 
      $id = $product->getProductid();
      $title = ucfirst($product->getTitle());
      $color = ucfirst($product->getColor());
      $price = $product->getPrice(); 
      $image = $product->getImage();
      ?>
      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
         <input type="hidden" name="id" value="<?= $id ?>">    
         <div class="card">
            <div class="image-container"> 
               <input type="image" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="submit" style="width:100%; max-height: 100%">
            </div>
            <h3><?= $title ?></h3>
            <p><?= $price . " " ?>kr</p>
            <p><?= $color ?></p>
         </div>
      </form>
      <?php } ?>   
</section>
