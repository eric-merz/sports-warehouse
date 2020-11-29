<?php 
  $title = "Sports Warehouse";
?>

<div id="slideshow" class="loading slideshow desktop">
  <ul class="bxslider">
    <li>
      <img src="images/slideshow_soccerBall.jpg" alt="Soccer ball in field" title="Soccer ball in field">
      <div class="overlay">
        <a href="browse-category.php?categoryId=5">
          <p>Soccer Balls</p>
          <button>Shop Now</button>
        </a>
      </div>
    </li>
    <li>
      <img src="images/slideshow_boxingGlove.jpg" alt="Punching a boxing bag" title="Punching a boxing bag">
      <div class="overlay">
        <a href="browse-category.php?categoryId=7">
          <p>Boxing Gloves</p>
          <button>Shop Now</button>
        </a>
      </div>
    </li>
    <li>
      <img src="images/slideshow_helmet.jpg" alt="A motorbike Helmet" title="A motorbike Helmet">
      <div class="overlay">
        <a href="browse-category.php?categoryId=2">
          <p>Helmets</p>
          <button>Shop Now</button>
        </a>
      </div>
    </li>
  </ul>
</div>

<main class="featured">
  <div class="section-heading-container">
    <h2 class="section-heading">Featured Products</h2>
  </div>
  <ul class="featured-products">
    <?php foreach ($itemRows as $row):
      $photo = "./images/".$row["photo"];
      $itemName = $row["itemName"];
      $price = $row["price"];
      $salePrice = $row["salePrice"];
      $description = $row["description"];
      $itemId = $row["itemId"];

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
    </ul>
</main>

<div class="partnerships">
  <div class="section-heading-container">
    <h2 class="section-heading">Our brands and partnerships</h2>
  </div>
  <div class="partnerships-content-container">
    <p>These are some of our top brands and partnerships.
      <span>The best of the best is here.</span>
    </p>
    <div class="brand-logos-container">
      <div class="brand-logos">
        <img class="mobile" src="./images/brands-mobile.jpg" alt="Partner Brands">
        <img class="desktop" src="./images/brands-desktop.png" alt="Partner Brands">
      </div>
    </div>
  </div>
</div>