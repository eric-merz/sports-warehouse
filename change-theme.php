<?php
  require_once "classes/Authentication.php";
  require_once "classes/category.php";

  $category = new Category();
  $categoryRows = $category->getCategories();

  if(!isset($_SESSION)) {
    session_start();
  }

  $title = "Change Theme";
  $loginName = $_SESSION["username"];
  
  // start buffer
  ob_start();

  // display the create user form
  include "templates/change-theme.html.php";

  $output = ob_get_clean();

  include "templates/login-pages-layout.html.php";
?>