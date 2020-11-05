<div class="section-heading-container">
    <h2 class="section-heading">All Products</h2>
</div>

<main class="browse-category">
  <?php
    $title = "View Products";
    $products = new Item();
    $viewProducts = $products->getItems();
    ?>
    <ul class="category-items">
    <?php foreach ($viewProducts as $viewProduct):
      $photo = "./images/".$viewProduct["photo"];
      $itemName = $viewProduct["itemName"];
      $price = $viewProduct["price"];
      $salePrice = $viewProduct["salePrice"];
      $description = $viewProduct["description"];
      $itemId = $viewProduct["itemId"];
      ?>
        <?php if($salePrice > 0): ?>
          <li class="product">
            <a href="view-single-product.php?itemId=<?= $itemId ?>">
              <img src="<?= $photo ?>" alt="<?= $description ?>">
              <p class="price sale">$<?= $salePrice ?></p>
              <p class="full-price">WAS $<span><?= $price ?></span></p>
              <p class="product-name"><?= $itemName ?></p>
            </a>
          </li>
        <?php endif; ?>
        <?php if($salePrice == 0): ?>
          <li class="product">
            <a href="view-single-product.php?itemId=<?= $itemId ?>">
              <img src="<?= $photo ?>" alt="<?= $description ?>">
              <p class="price">$<?= $price ?></p>
              <p class="product-name"><?= $itemName ?></p>
            </a>
          </li>
        <?php endif; ?>
    <?php endforeach;
  ?>
  </ul>
</main>