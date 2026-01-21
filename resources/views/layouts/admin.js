function toggleSubmenu(event, menuId) {
    event.preventDefault();

    const submenu = document.getElementById(menuId);
    const isOpen = submenu.style.display === "block";

    document.querySelectorAll(".submenu").forEach(menu => {
        menu.style.display = "none";
    });

    submenu.style.display = isOpen ? "none" : "block";
}