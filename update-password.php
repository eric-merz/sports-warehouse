<?php
  require_once "classes/Authentication.php";
  require_once "classes/category.php";

  $category = new Category();
  $categoryRows = $category->getCategories();

  if(!isset($_SESSION)) {
    session_start();
  }

  $title = "Update password";
  //read stylesheet theme from session
  if(isset($_SESSION["theme"])) {
    $theme = "./styles/" . $_SESSION["theme"] . ".css";
  } else {
    $theme = "./styles/style.css";
  }
  
  // the authentication class is static so no need to create an instance of the class

  $message = "";

  if(!empty($_POST["newPassword"])) {
    // add user
    Authentication::updatePassword($_POST["newPassword"]);
  }

  // start buffer
  ob_start();

  // display create user form
  include "templates/update-password.html.php";

  $output = ob_get_clean();

  include "templates/login-pages-layout.html.php";
?>