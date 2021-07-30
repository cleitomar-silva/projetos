const menuItems = document.querySelectorAll('.cl-navbar a[href^="#"]');

menuItems.forEach(item => {
    item.addEventListener('click', scrollToIdOnClick );
})

function scrollToIdOnClick(event){
    event.preventDefault();
    const element = event.target;
    const id = element.getAttribute('href');
    const to = document.querySelector(id).offsetTop;

    window.scroll({
        top: to - 65, //margin top
        behavior: "smooth",
    });
}