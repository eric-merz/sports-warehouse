<?php
  require_once "classes/item.php";
  require_once "classes/category.php";

  session_start();

  // create objects
  $singleItems = new Item();
  $category = new Category();

  $message = "";

  // retrieve all categories so they can be listed
  $categoryRows = $category->getCategories();

  // retrieve single items so it can be listed
  if(isset($_GET['itemId'])) {
    $singleItem = $singleItems->getSingleItem($_GET['itemId']);
  } elseif (isset($_POST['itemId'])) {
    $singleItem = $singleItems->getSingleItem($_POST['itemId']);
  }

  // start buffer
  ob_start();

  //display selected product
  include "templates/view-single-product.html.php";

  $output = ob_get_clean();

  include "templates/layout.html.php";
?>