<?php
  require_once "classes/Authentication.php";
  require_once "classes/category.php";

  $category = new Category();
  $categoryRows = $category->getCategories();


  if(!isset($_SESSION)) {
      session_start();
  }

  $title = "Login";
  //read stylesheet theme from session
  if(isset($_SESSION["theme"])) {
    $theme = "./styles/" . $_SESSION["theme"] . ".css";
  } else {
    $theme = "./styles/style.css";
  }
  
  $message = "";

  if(isset($_POST["loginSubmit"])) {
    if(!empty($_POST["username"]) && !empty($_POST["password"])) {
      // authenticate user
      $loginSuccess = Authentication::login($_POST["username"], $_POST["password"]);
      if(!$loginSuccess) {
        $message = "Username or password is incorrect";
        $error = true;
      }
    }
  }

  // start buffer
  ob_start();

  // display create user form
  include "templates/login-form.html.php";

  $output = ob_get_clean();

  include "templates/login-pages-layout.html.php";
?>