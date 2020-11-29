<?php
  require_once "classes/Authentication.php";
  require_once "classes/category.php";

  $category = new Category();
  $categoryRows = $category->getCategories();

  if(!isset($_SESSION)) {
    session_start();
  }

  $title = "Edit Categories";

  //the authentication class is static so there is no need to create an instance of the class

  $message = "";

  Authentication::protect();

  // start buffer
  ob_start();

  // display admin content
  include "templates/edit-categories.html.php";

  $output = ob_get_clean();

  include "templates/login-pages-layout.html.php";
?>