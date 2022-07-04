import "./styles/app.scss";
require("bootstrap");

require("@fortawesome/fontawesome-free/css/all.min.css");
require("@fortawesome/fontawesome-free/js/all.js");

window.onload = () => {
    /*====== Sidebar admin ======*/

    let aside = document.querySelector(".sidebar_admin");
    let icon = aside.querySelector(".menu_icon");
    let li = aside.querySelectorAll(".side_item");

    icon.onclick = () => {
        aside.classList.toggle("expand");
    };

    for (let i of li) {
        i.onclick = activeLi;
    }

    function activeLi() {
        const list = Array.from(li);
        list.forEach((e) => e.classList.remove("active"));
        this.classList.add("active");
    }

    /*====== Copy button (admin / Contact list) ======*/

    const listEmailsBtn = document.getElementById("copyEmailsBtn");
    const listEmailsSubscribeBtn = document.getElementById("copyEmailsSubscribedBtn");

    if (listEmailsBtn) {
        listEmailsBtn.addEventListener("click", function () {
            document.getSelection().removeAllRanges();
            let containerid = "listMails";
            window.getSelection;
            let range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("copy");
            alert("Toutes les adresses mail on été copié");
        });
    }

    if (listEmailsSubscribeBtn) {
        listEmailsSubscribeBtn.addEventListener("click", function () {
            let containerSubscribeId = "listMailsSubscribed";
            document.getSelection().removeAllRanges();
            window.getSelection;
            let rangeSubscribe = document.createRange();
            rangeSubscribe.selectNode(document.getElementById(containerSubscribeId));
            window.getSelection().addRange(rangeSubscribe);
            document.execCommand("copy");
            alert("Toutes les adresses mail on été copié");
        });
    }
};

/*====== Burger menu mobile ======*/

const hamburgerMenu = document.getElementById('hamburgerMenu');
var burgerMenu = document.getElementById("burger-menu");
var overlay = document.getElementById("mobile_menu");

if (burgerMenu){
    burgerMenu.addEventListener("click", function () {
        this.classList.toggle("close");
        overlay.classList.toggle("overlay");
        if (document.documentElement.style.overflow === "hidden") {
            document.documentElement.style.overflow = "initial";
        } else {
            document.documentElement.style.overflow = "hidden";
        }
    })
}
