document.addEventListener("DOMContentLoaded", function () {
  const currentLocation = window.location.href;
  const navLinks = document.querySelectorAll(".nav-link");

  navLinks.forEach((link) => {
    if (currentLocation.includes(link.getAttribute("href"))) {
      link.classList.add("active");
    }
  });

  const menuToggle = document.querySelector(".menu-toggle");
  const navMenu = document.querySelector(".navbar ul");

  menuToggle.addEventListener("click", () => {
    navMenu.classList.toggle("active");
  });
});
