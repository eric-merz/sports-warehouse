<?php foreach ($singleItem as $item):
  $itemId = $item["itemId"];
  $name = $item["itemName"];
  $photo = "./images/".$item["photo"];
  $salePrice = $item["salePrice"];
  $price = $item["price"];
  $description = $item["description"];
  $title = "$name";
  ?>

  <div class="section-heading-container">
    <h2 class="section-heading"><?=  $name ?></h2>
  </div>

  <main>
    <div class="view-single-product">
      <?php if($salePrice > 0): ?>
        <div class="img-container">
          <img src="<?= $photo ?>" alt="<?= $description ?>">
        </div>
        <div class="content-container">
          <p class="item-description"><?= $description ?></p>
          <p class="price sale">$<?= $salePrice ?></p>
          <p class="full-price">WAS $<span><?= $price ?></span></p>
          <input type="submit" name="addCartButton" id="addCartButton" value="Add to Cart">
        </div>
      <?php endif; ?>
      <?php if($salePrice == 0): ?>
        <div class="img-container">
          <img src="<?= $photo ?>" alt="<?= $description ?>">
        </div>
        <div class="content-container">
          <p class="item-description"><?= $description ?></p>
          <p class="price"><?= $price ?></p>
          <input type="submit" name="addCartButton" id="addCartButton" value="Add to Cart">
        </div>
      <?php endif; ?>
      </div>
  </main>
<?php endforeach;