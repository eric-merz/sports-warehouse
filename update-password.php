<?php
  require_once "classes/Authentication.php";
  require_once "classes/category.php";

  $category = new Category();
  $categoryRows = $category->getCategories();

  $title = "Update password";

  // the authentication class is static so no need to create an instance of the class

  $message = "";

  if(!empty($_POST["newPassword"])) {
    // add user
    $message = Authentication::updatePassword($_POST["newPassword"]);
  }

  // start buffer
  ob_start();

  // display create user form
  include "templates/update-password.html.php";

  $output = ob_get_clean();

  include "templates/login-pages-layout.html.php";
?>