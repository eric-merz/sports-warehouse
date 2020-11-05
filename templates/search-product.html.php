<?php
  //check if the search button was clicked
  if(isset($_GET["search-button"]) && isset($_GET["search"])) {
    // search query
    $search = $_GET["search"];
  }
  $title = "Search: " . $search;
?>

<div class="section-heading-container">
  <h2 class="section-heading">Search: <?=  $search ?></h2>
</div>

<main class="browse-category">
  <ul class="category-items">
    <?php
      $search = new Item();
      $searchings = $search->getSearched();
      ?>
      <?php foreach ($searchings as $searching):
        $itemName = $searching["itemName"];
        $photo = "./images/".$searching["photo"];
        $itemName = $searching["itemName"];
        $price = $searching["price"];
        $salePrice = $searching["salePrice"];
        $description = $searching["description"];
        $itemId = $searching["itemId"];
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
      <?php endforeach; ?>
      <?php if ($searchings == NULL):?>
      <p>Sorry, no products found. Try a different search.</p>
      <?php endif; ?>
  </ul>
</main>