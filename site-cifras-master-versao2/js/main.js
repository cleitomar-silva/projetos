const navbarToggler = document.querySelector(".cl-navbar-toggler")
const navbarMenu = document.querySelector(".cl-navbar ul")
const navbarLinks = document.querySelectorAll(".cl-navbar a")

navbarToggler.addEventListener("click", navbarTogglerClick)

function navbarTogglerClick(){
    navbarToggler.classList.toggle("cl-open-navbar-toggler")
    navbarMenu.classList.toggle("cl-open")
}

navbarLinks.forEach(elem => elem.addEventListener("click", navbarLinkClick))

function navbarLinkClick(){
    if(navbarMenu.classList.contains("cl-open")){
        navbarToggler.click();
    }
}