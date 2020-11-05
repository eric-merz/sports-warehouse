<?php
  require_once "classes/form-validation.php";
  require_once "classes/item.php";
  require_once "classes/category.php";

  $title = "Contact Us: Sports Warehouse";

  //create FormValidation object so that it can be used
  $form = new FormValidation();
  $category = new Category();

  // retrieve all categories so they can be listed
  $categoryRows = $category->getCategories();

  //start buffer
  ob_start();
  
  include "templates/about-us.html.php";

  $output = ob_get_clean();
  // include "templates/contact-layout.html.php";
  include "templates/simple-header-layout.html.php";
?>