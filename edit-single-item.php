<?php
  require_once "classes/Authentication.php";
  require_once "classes/category.php";
  require_once "classes/item.php";

  $category = new Category();
  $item = new Item();
  $categoryRows = $category->getCategories();
  $itemRows = $item->getItems();

  if(!isset($_SESSION)) {
    session_start();
  }

  $title = "Edit Single Item";
  //read stylesheet theme from session
  if(isset($_SESSION["theme"])) {
    $theme = "./styles/" . $_SESSION["theme"] . ".css";
  } else {
    $theme = "./styles/style.css";
  }
    
  //the authentication class is static so there is no need to create an instance of the class

  $message = "";
  $error = false;

  Authentication::protect();

  // get the id of the item selected
  if(isset($_POST["edit"]) && isset($_POST["itemSelected"])) {
    $selectedItem = $item->getSingleItem($_POST["itemSelected"]);

    foreach ($selectedItem as $row) {
      $selectedItemId = $row["itemId"];
      $selectedItemName = $row["itemName"];
      $selectedItemPrice = $row["price"];
      $selectedItemSalePrice = $row["salePrice"];
      $selectedItemDescription = $row["description"];
      $selectedItemFeatured = $row["featured"];
      $selectedItemCategory = $row["categoryId"];
      $selectedItemPhoto = $row["photo"];
    }
  }

  // delete item
  // check if delete button has been pressed
  if(isset($_POST["delete"])) {
    $item->deleteItem($_POST["deleteItemId"]);
    header("Location:edit-items.php");
  }


  // modify item
  // check if modify button has been pressed
  if(isset($_POST["modify"])) {
    // check if a category id was supplied
    if(isset($_POST["modifyItem"])) {
      $category->modifyItem();
    }
    header("Location:edit-items.php");
  }

  // start buffer
  ob_start();

  // display admin content
  include "templates/edit-single-item.html.php";

  $output = ob_get_clean();

  include "templates/login-pages-layout.html.php";
?>"


    <!-- Array ( 
      [0] => Array ( 
        [itemId] => 1 
        [0] => 1 
        
        [photo] => soccerBall.jpg
        [1] => soccerBall.jpg 
        
        [itemName] => Adidas Euro16 Top Soccer Ball 
        [2] => Adidas Euro16 Top Soccer Ball 
        
        [price] => 46.00 
        [3] => 46.00 
        
        [salePrice] => 35.95 
        [4] => 35.95 
        
        [description] => adidas Performance Euro 16 Official Match Soccer Ball, Size 5, White/Bright Blue/Solar 
        [5] => adidas Performance Euro 16 Official Match Soccer Ball, Size 5, White/Bright Blue/Solar 
        
        [categoryId] => 5 
        [6] => 5 
        
        [featured] => 1 
        [7] => 1 ) )  -->
