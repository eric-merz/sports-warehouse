<?php
  require_once "classes/Authentication.php";
  require_once "classes/category.php";

  $category = new Category();
  $categoryRows = $category->getCategories();

  if(!isset($_SESSION)) {
    session_start();
  }

  $title = "Protected Page";

  //the authentication class is static so there is no need to create an instance of the class

  $message = "";

  Authentication::protect();

  // start buffer
  ob_start();

  // display admin content
  include "templates/admin-section.html.php";

  $output = ob_get_clean();

  include "templates/login-pages-layout.html.php";
?>