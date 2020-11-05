<?php
  require_once "classes/form-validation.php";
  require_once "classes/item.php";
  require_once "classes/category.php";

  $title = "Contact Us: Sports Warehouse";

  //create FormValidation object so that it can be used
  $form = new FormValidation();
  $category = new Category();

  // retrieve all categories so they can be listed
  $categoryRows = $category->getCategories();

  //start buffer
  ob_start();

  //check if the submit button was clicked
  if(isset($_POST["submitButton"])) {
    //validate name was supplied
    $firstNameMessage = $form->checkEmpty("firstName");

    $lastNameMessage = $form->checkEmpty("lastName");

    //validate valid email address
    $emailMessage = $form->checkEmail("email");

    //if any checks did not pass valid will be set to false
    //if all checks passed valid will be true
    if($form->valid == true) {
      //redirect to the thanks page
      header("Location:thanks.php");
    } else {
      //display form with errors listed
      include "templates/contact-form.html.php";
    }
  } else {  //submit button was not clicked the form is displayed for the first time
    //display form without errors
    $form->valid = true;
    $firstNameMessage = "";
    $lastNameMessage = "";
    $emailMessage = "";
    include "templates/contact-form.html.php";
  }
  
  $output = ob_get_clean();
  // include "templates/contact-layout.html.php";
  include "templates/simple-header-layout.html.php";
?>