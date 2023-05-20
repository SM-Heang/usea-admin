const navItems = document.querySelector(".nav .nav-item");
const navLink = document.querySelector(".nav-treeview .nav-link");

navLink.addEventListener("click", function () {
    navItems.classList.add("menu-open");
    navLink.classList.add("active");
});
