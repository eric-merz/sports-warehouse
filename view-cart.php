<?php
  require_once "classes/item.php";
  require_once "classes/category.php";
  require_once "classes/shopping-cart.php";

  session_start();

  // create a category object
  $item = new Item();
  $category = new Category();

  $message = "";

  // retrieve all categories so they can be listed
  $categoryRows = $category->getCategories();

  // add ietm to shopping cart
  if (isset($_POST["buy"])) {
    // check product id and qty are not empty
    if (!empty($_POST["itemId"]) && !empty($_POST["qty"])) {
      $itemId = $_POST["itemId"];
      $qty = $_POST["qty"];

      // get the product details
      $item->getProduct($itemId);

      // create a new cart item so it can be added to the shopping cart
      $item = new CartItem($item->getProductName(), $qty, $item->getPrice(), $itemId);

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
    header("Location: shopping.php");
  }

  // remove item from shopping cart
  if (isset($_POST["remove"])) {
    // check product id was supplied and cart exists in session
    if(!empty($_POST["productId"]) && isset($_SESSION["cart"])) {
      $productId = $_POST["productId"];

      // create a new cart item so it can be removed from the shopping cart
      // the only value that is important is the product Id
      $item = new CartItem("", 0, 0, $productId);

      // read shopping cart from session
      $cart = $_SESSION["cart"];

      // remove item from shopping cart
      $cart->removeItem($item);

      // save shopping cart back into session
      $_SESSION["cart"] = $cart;
    }
    header("Location: view-cart.php");
  }

  // start buffer
  ob_start();

  //display featured items
  include "templates/view-cart.html.php";

  $output = ob_get_clean();

  include "templates/layout.html.php";
?>