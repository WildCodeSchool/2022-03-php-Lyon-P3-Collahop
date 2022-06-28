import './styles/app.scss';
require("bootstrap");

require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

/*====== Sidebar admin ======*/

window.onload = () => {

    let aside = document.querySelector('.sidebar_admin');
    let icon = aside.querySelector('.menu_icon');
    let li = aside.querySelectorAll('.side_item');
    
    
    icon.onclick = () => {
        aside.classList.toggle('expand');

    }
    
    for(let i of li) {
        i.onclick = activeLi;
    }
    
    function activeLi() {
        const list = Array.from(li);
        list.forEach(e=>e.classList.remove('active'));
        this.classList.add('active');
    }
}   


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
