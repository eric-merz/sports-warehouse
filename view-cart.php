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
  }

  // start buffer
  ob_start();

  //display featured items
  include "templates/view-cart.html.php";

  $output = ob_get_clean();

  include "templates/layout.html.php";
?>