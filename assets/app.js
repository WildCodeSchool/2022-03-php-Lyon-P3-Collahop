import './styles/app.scss';
require("bootstrap");

require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

var burgerMenu = document.getElementById("burger-menu");

var overlay = document.getElementById("mobile_menu");

burgerMenu.addEventListener("click", function () {
    this.classList.toggle("close");
    overlay.classList.toggle("overlay");
    if (document.documentElement.style.overflow === "hidden") {
        document.documentElement.style.overflow = "initial";
    } else {
        document.documentElement.style.overflow = "hidden";
    }
});

