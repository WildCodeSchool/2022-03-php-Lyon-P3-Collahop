/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */


import './styles/app.scss';
import './styles/homepage.scss';
import './styles/mixins.scss';
import './styles/contacts.scss';
import "./styles/navbar.scss";
import "./styles/carrousel.scss";
require("bootstrap");

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
