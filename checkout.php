<?php
  require_once "classes/category.php";

  session_start();

  $category = new Category();
  $categoryRows = $category->getCategories();


  $title = "Checkout";

  // start buffer
  ob_start();

  // display checkout form
  include "templates/checkout-form.html.php";

  $output = ob_get_clean();

  include "templates/layout.html.php";
?>