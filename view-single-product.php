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

  // retrievefeatured items so they can be listed
  $itemRows = $item->getFeatured();

  // start buffer
  ob_start();

  //display featured items
  include "templates/view-single-product.html.php";

  $output = ob_get_clean();

  include "templates/layout.html.php";
?>