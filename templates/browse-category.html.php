<?php
  $category = new Category();
  $categoryNames = $category->getCategoryName();
  ?>
  <?php foreach ($categoryNames as $categoryName):
    $name = $categoryName["categoryName"];
    $title = "$name";
    ?>
    <div class="section-heading-container">
      <h2 class="section-heading">Category: <?=  $name ?></h2>
    </div>
  <?php endforeach;
?>

<main class="browse-category">
  <ul class="category-items">
    <?php
      $category = new Item();
      $categoryIds = $category->getCatItems();
      ?>
      <?php foreach ($categoryIds as $categoryId):
        $name = $categoryName["categoryName"];
        $photo = "./images/".$categoryId["photo"];
        $itemName = $categoryId["itemName"];
        $price = $categoryId["price"];
        $salePrice = $categoryId["salePrice"];
        $description = $categoryId["description"];
        $itemId = $categoryId["itemId"];
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