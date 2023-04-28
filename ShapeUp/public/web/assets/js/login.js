"use strict";
const input1 = document.getElementById("input1");
const input2 = document.getElementById("input2");
const input3 = document.getElementById("input3");

input1.addEventListener("focus", () => {
    input2.classList.add("input-focused");
    input3.classList.add("input-focused");
});

input1.addEventListener("blur", () => {
    input2.classList.remove("input-focused");
    input3.classList.remove("input-focused");
});

input2.addEventListener("focus", () => {
    input1.classList.add("input-focused");
    input3.classList.add("input-focused");
});

input2.addEventListener("blur", () => {
    input1.classList.remove("input-focused");
    input3.classList.remove("input-focused");
});

input3.addEventListener("focus", () => {
    input2.classList.add("input-focused");
    input1.classList.add("input-focused");
});

input3.addEventListener("blur", () => {
    input2.classList.remove("input-focused");
    input1.classList.remove("input-focused");
});

