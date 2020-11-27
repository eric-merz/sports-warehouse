<?php
  require_once "classes/Authentication.php";
  require_once "classes/category.php";

  $category = new Category();
  $categoryRows = $category->getCategories();

  $title = "Create user";

  // the authentication class is static so no need to create an instance of the class

  $message = "";

  if(!empty($_POST["username"]) && !empty($_POST["password"])) {
    // add user
    $message = Authentication::createUser($_POST["username"], $_POST["password"]);
  }

  // start buffer
  ob_start();

  // display create user form
  include "templates/create-user-form.html.php";

  $output = ob_get_clean();

  include "templates/login-pages-layout.html.php";
?>