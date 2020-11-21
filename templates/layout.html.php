<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./styles/style.css">
  <title><?= $title ?></title>
</head>

<body>
  <div class="site-wrapper">
    <header class="header-wrapper">
      <div class="top-menu-wrapper">
        <div class="top-menu">
          <!-- Mobile Cart & Login Buttons -->
          <div class="mobile mobile-menu-container">
            <button id="menu-toggle" class="mobile">
              <i class="fas fa-bars"></i>Menu
            </button>
            <a href="view-cart.php">
              <button id="mobile-cart" class="mobile">
                <i class="fas fa-shopping-cart"></i>View Cart
              </button>
            </a>
            <div class="mobile cart-items">
              <p>0 Items</p>
            </div>
          </div>
  
          <!-- Navigation Links -->
          <nav class="menu">
            <button id="mobile-login" class="mobile">
              <i class="fas fa-lock"></i>Login
            </button>
            <ul class="links">
              <li class="link">
                <a href="landing.php"><i class="far fa-circle"></i>Home</a>
              </li>
              <li class="link">
                <a href="about-us.php"><i class="far fa-circle"></i>About SW</a>
              </li>
              <li class="link">
                <a href="contact.php"><i class="far fa-circle"></i>Contact Us</a>
              </li>
              <li class="link">
                <a href="view-products.php"><i class="far fa-circle"></i>View Products</a>
              </li>
            </ul>
          </nav>
  
          <!-- Desktop Cart & Login Buttons -->
          <button id="desktop-login" class="desktop">
            <i class="fas fa-lock"></i>Login
          </button>
          <a href="view-cart.php">
            <button id="desktop-cart" class="desktop">
              <i class="fas fa-shopping-cart"></i>View Cart
            </button>
          </a>
          <div class="desktop cart-items">
            <p>0 Items</p>
          </div>
        </div>
      </div>
      
      <!-- Logo and Search -->
      <div class="logo-and-search">
        <a href="landing.php">
          <h1>
            <span class="semi-circle">SW </span>Sports <span class="special">Warehouse</span>
          </h1>
        </a>
  
        <!-- Search Bar -->
        <div class="search-container">
          <form action="search-product.php" method="GET">
            <input type="text" name="search" placeholder="Search Products" class="search-field">
            <button id="search-button" type="submit" name="search-button" value="search">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>    
      </div>
    </header>
    
    <div class="categories-menu-container">
      <div class="categories-menu">
        <ul class="categories">
          <?php foreach ($categoryRows as $row):
          $categoryName = $row["categoryName"];
          $categoryId = $row["categoryId"];
          ?>
          <li class="category">
            <a href="browse-category.php?categoryId=<?= $categoryId ?>"><?= $categoryName ?></a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <?= $output ?>

    <footer>
      <div class="footer-wrapper-container">
        <div class="footer-wrapper">
          <section class="footer-navigation-container">
            <h3>Site Navigation</h3>
            <ul class="footer-navigation">
              <li><a href="landing.php">Home</a></li>
              <li><a href="about-us.php">About SW</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <li><a href="view-products.php">View Products</a></li>
              <li><a href="privacy-policy.php">Privacy Policy</a></li>
            </ul>
          </section>
  
          <section class="footer-categories-menu desktop">
            <h3>Product Categories</h3>
              <ul class="footer-categories">
                <?php foreach ($categoryRows as $row):
                $categoryName = $row["categoryName"];
                $categoryId = $row["categoryId"];
                ?>
                <li class="footer-category">
                  <a href="browse-category.php?categoryId=<?= $categoryId ?>"><?= $categoryName ?></a>
                </li>
                <?php endforeach; ?>
              </ul>
          </section>
          
          <section class="footer-external-links">
            <h3>Contact Sports Warehouse</h3>
            <div class="external-links">
              <div class="facebook-container">
                <a href="https://www.facebook.com/" target="_blank">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <p>Facebook</p>
              </div>
              <div class="twitter-container">
                <a href="https://twitter.com/?lang=en" target="_blank">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <p>Twitter</p>
              </div>
              <div class="other-container">
                <a href="https://www.google.com/" target="_blank">
                  <i class="fa fa-telegram" aria-hidden="true"></i>
                </a>
                <p>Other</p>
              </div>
            </div>
          </section>
        </div>
      </div>
      
      <div class="copyright">
        <p>&copy; Copyright 2020 Sports Warehouse.</p>
        <p>All rights reserved.</p>
        <p>Website made by Awesomesauce Design.</p>
      </div>
    </footer>
  </div>
<script src="./scripts/app.js"></script>
<script src="https://kit.fontawesome.com/5888dd2011.js" crossorigin="anonymous"></script>
</body>
</html>