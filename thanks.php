<?php
  require_once "classes/category.php";

  $title = "Thank you!";
  
  // create a category object
  $category = new Category();

  //start buffer
  ob_start();

  // retrieve all categories so they can be listed
  $categoryRows = $category->getCategories();
  
  //display confirmation
  include "templates/confirmation.html.php";
  $output = ob_get_clean();
  include "templates/simple-header-layout.html.php";
?>