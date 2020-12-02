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

  $title = "Edit Items";
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

  // insert new item
  // check if addNew button has been pressed
  if(isset($_POST["addNew"])) {
    // check if a category name was supplied
    if(!empty($_POST["itemName"]) && !empty($_POST["itemPrice"]) && !empty($_POST["itemSalePrice"]) && !empty($_POST["itemDescription"])) {
      // save the file
      // specify the directory where image will be saved
      $targetDirectory = "./images/";
    
      // get the file name
      $photoPath = basename($_FILES["photoPath"]["name"]);
      
      // set the entire path
      $targetFile = $targetDirectory . $photoPath;

      // only allow image files
      $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
      if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif") {
        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
        $error = true;
      }

      // check the file size php.ini has an upload_max_filesize, default set to 2M
      // if the file size exceeds the limit the error code is 1
      if ($_FILES["photoPath"]["error"] == 1) {
        $message = "Sorry, your file is too large. Max of 2M is allowed";
        $error = true;
      }

      if ($error == false) {
        if (move_uploaded_file($_FILES["photoPath"]["tmp_name"], $targetFile)) {
          $message = "The file $photoPath has been uploaded";
        } else {
          $message = "Sorry there was an error uploading your file. Error code:" . $_FILES["photoPath"]["error"];
        }
      } else {
        $photoPath = "";
      }

      // add the item
      $item->addItem();
    }
    header("Location:edit-items.php");
  }

  // start buffer
  ob_start();

  // display admin content
  include "templates/edit-items.html.php";

  $output = ob_get_clean();

  include "templates/login-pages-layout.html.php";
?>