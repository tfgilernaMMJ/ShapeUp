"use strict";
window.Toastify = require('toastify-js');
// Obtén los botones de editar y eliminar
const editBtn = document.querySelector("#editBtn");
const deleteBtn = document.querySelector("#deleteBtn");

// Obtén los modales correspondientes
const editModal = document.querySelector("#editModal");
const deleteModal = document.querySelector("#deleteModal");

// Agrega un evento de clic a cada botón que muestre el modal correspondiente
editBtn.addEventListener("click", () => {
    editModal.classList.add("show");
    editModal.style.display = "block";
});

deleteBtn.addEventListener("click", () => {
    deleteModal.classList.add("show");
    deleteModal.style.display = "block";
});

// Obtener todos los elementos con la clase "dropdown-submenu"
const dropdownSubmenus = document.querySelectorAll(".dropdown-submenu");

// Iterar sobre cada elemento y agregar un controlador de eventos al elemento "a" del submenú
dropdownSubmenus.forEach(function (dropdownSubmenu) {
    const dropdownToggle = dropdownSubmenu.querySelector(".dropdown-toggle");

    dropdownToggle.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();

        // Cerrar todos los submenús abiertos
        const openedDropdownSubmenus = document.querySelectorAll(
            ".dropdown-submenu.show"
        );
        openedDropdownSubmenus.forEach(function (openedDropdownSubmenu) {
            openedDropdownSubmenu.classList.remove("show");
        });

        // Mostrar el submenú actual
        dropdownSubmenu.classList.toggle("show");
    });
});



