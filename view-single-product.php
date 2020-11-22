<?php
  require_once "classes/item.php";
  require_once "classes/category.php";
  require_once "classes/shopping-cart.php";

  session_start();

  // create objects
  $product = new Item();
  $category = new Category();

  $message = "";

  // retrieve all categories so they can be listed
  $categoryRows = $category->getCategories();

  // retrieve single items so it can be listed
  if(isset($_GET['itemId'])) {
    $singleItem = $product->getSingleItem($_GET['itemId']);
  } elseif (isset($_POST['itemId'])) {
    $singleItem = $product->getSingleItem($_POST['itemId']);
  }

  // add item to shopping cart
  if (isset($_POST["addCartButton"])) {
    // check product id and qty are not empty
    if (!empty($_POST["itemId"]) && !empty($_POST["qty"])) {
      $itemId = $_POST["itemId"];
      $qty = $_POST["qty"];

      // get the product details
      $product->getProduct($itemId);
      
      // check if it is on sale
      if($product->getSalePrice() > 0) {
        $price = $product->getSalePrice();
      } else {
        $price = $product->getPrice();
      }

      // create a new cart item so it can be added to the shopping cart
      $item = new CartItem($product->getItemName(), $qty, $price, $itemId);

      // check if shopping cart exists
      if(!isset($_SESSION["cart"])) {
        // if shopping cart is not set create a new empty shopping cart
        $cart = new ShoppingCart();
      } else {
        // read shopping cart from session
        $cart = $_SESSION["cart"];
      }

      // add item to shopping cart
      $cart->addItem($item);

      // save shopping cart back into session
      $_SESSION["cart"] = $cart;
    }
    
    header("Location: view-cart.php");
  }

  // start buffer
  ob_start();

  //display selected product
  include "templates/view-single-product.html.php";

  $output = ob_get_clean();

  include "templates/layout.html.php";
?>