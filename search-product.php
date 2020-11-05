<?php
  require_once "classes/item.php";
  require_once "classes/category.php";

  session_start();

  // create a category object
  $item = new Item();
  $category = new Category();

  $message = "";

  // retrieve all categories so they can be listed
  $categoryRows = $category->getCategories();

  // retrieve all items in category so they can be listed
  $itemRows = $item->getItems();

  // start buffer
  ob_start();

  include "templates/search-product.html.php";

  $output = ob_get_clean();

  //display categories
  include "templates/layout.html.php";
?>