"use strict";

/*=======================================================================
-------------------------- jQuery slideshow  ----------------------------
=========================================================================*/
$(document).ready(function() {
  // remove loading status - slideshow is hidden by default, this will unhide it when JS is ready.
  $('#slideshow').removeClass('loading');

  // activate and customize the slideshow
  $('.bxslider').bxSlider({
    mode: 'horizontal',
    captions: false,
    auto: true,
    stopAutoOnClick: true,
    pause: 4000,
    speed: 500
  });
});

/*=======================================================================
--------------------- References to the DOM  ----------------------------
=========================================================================*/

const menuToggle = document.getElementById("menu-toggle");
const menu = document.querySelector(".menu")
const checkoutForm = document.getElementById("checkout");

/*=======================================================================
------------------ Menu button functionality ----------------------------
=========================================================================*/

document.addEventListener('DOMContentLoaded', () => {
  // make sure the toggle button and menu exist
  if (menuToggle && menu) {
    // hide the menu
    menu.classList.remove("show");

    // add click event listener to menu toggle
    menuToggle.addEventListener("click", (event) => {
      event.preventDefault();

      menu.classList.toggle("show");
    })
  }
});

/*=======================================================================
------------------ Order delivery and payment validation ----------------
=========================================================================*/


// check that the form exists (in the current page)
if(checkoutForm) {
  // disable HTML5 validation ("novaildate" is a boolean attribute)
  checkoutForm.setAttribute("novalidate", "");

  // Apply our own validation using a "submit" event handler
  checkoutForm.addEventListener("submit", (event) => {
    // get references to the form fields
    const firstName = checkoutForm.elements["firstName"];
    const lastName = checkoutForm.elements["lastName"];
    const address = checkoutForm.elements["address"];
    const email = checkoutForm.elements["email"];


    // clear all existing error
    hideAllErrors(checkoutForm);

    // define regular expression patterns
    const regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    // check if form values are valid
    if(firstName.value.trim().length < 2) {
      showError(firstName, event, "First Name must be at least 2 characters.");
    }

    if(lastName.value.trim().length < 2) {
      showError(lastName, event, "Last Name must be at least 2 characters.");
    }

    if(address.value.trim().length < 10) {
      showError(address, event, "Please enter a valid address (at least 10 characters).");
    }

    if(email.value === "") {
      showError(email, event, "Email is required.");
    } else if(!regexEmail.test(email.value)) {
      showError(email, event, "Must be valid email address.");
    }
  })
}

/*=======================================================================
------------------------------ Functions --------------------------------
=========================================================================*/

function showError(field, event, errorMessage) {
  event.preventDefault();
  field.parentElement.classList.add("error-row");
    // Check if custom error message is provided
    // ...if not, just use the existing span that's in the DOM (if it exists)
    if (errorMessage) {
      // Find span.error-message in the DOM
      let errorSpan = field.parentElement.querySelector(".error-message");

      // Check if error span doesn't exist... create a new one!
      if (!errorSpan) {
        errorSpan = document.createElement("span");
        errorSpan.classList.add("error-message");
        field.parentElement.appendChild(errorSpan);
      }

      // Update error span's message
      errorSpan.innerText = errorMessage;
  }
}

function hideAllErrors(form) {
  // find all elements with error-row class in the form
  const errors = form.querySelectorAll(".error-row");

  // loop using forOf
  for (let error of errors) {
    error.classList.remove("error-row");
  }
}