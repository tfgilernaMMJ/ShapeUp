"use strict";

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
