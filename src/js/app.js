document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
  darkMode();
});

function eventListeners() {
  const mobileMenu = document.querySelector(".nav-mobile");

  mobileMenu.addEventListener("click", navResponsive);
}

function navResponsive() {
  const navegacion = document.querySelector(".navegacion");

  //navegacion.classList.toggle('mostrar);
  if (navegacion.classList.contains("mostrar")) {
    navegacion.classList.remove("mostrar");
  } else {
    navegacion.classList.add("mostrar");
  }
}

function darkMode() {
  const preferenceDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

  if (preferenceDarkMode.matches) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }

  preferenceDarkMode.addEventListener("change", function () {
    if (preferenceDarkMode.matches) {
      document.body.classList.add("dark-mode");
    } else {
      document.body.classList.remove("dark-mode");
    }
  });

  const btnDarkMode = document.querySelector(".dark-mode-boton");

  btnDarkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");
  });
}
