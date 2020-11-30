<?php
  require_once "classes/Authentication.php";
  require_once "classes/category.php";

  $category = new Category();
  $categoryRows = $category->getCategories();

  if(!isset($_SESSION)) {
    session_start();
  }

  //read stylesheet theme from session
  if(isset($_SESSION["theme"])) {
    $theme = "./styles/" . $_SESSION["theme"] . ".css";
  } else {
    $theme = "./styles/style.css";
  }

  $message = "";

  if(isset($_POST["submit"])) {
    //get the selected colour theme
    $_SESSION["theme"] = $_POST["changeTheme"];
    $theme = "./styles/" . $_SESSION["theme"] . ".css";
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