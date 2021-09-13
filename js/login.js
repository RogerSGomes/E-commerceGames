const sig_in_btn = document.querySelector("#sign-in-btn");
const sig_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sig_up_btn.addEventListener('click', () => {
    container.classList.add("sign-up-mode");
});

sig_in_btn.addEventListener('click', () => {
    container.classList.remove("sign-up-mode");
});