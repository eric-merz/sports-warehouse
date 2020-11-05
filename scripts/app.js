// Menu functionality
document.addEventListener('DOMContentLoaded', () => {
  // get the toggle button and the menu
  const menuToggle = document.getElementById("menu-toggle");
  const menu = document.querySelector(".menu");

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