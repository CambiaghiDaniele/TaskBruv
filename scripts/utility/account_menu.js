document.addEventListener("DOMContentLoaded", () => {
    let accountBtn = document.getElementById("accountBtn");
    let accountMenu = document.getElementById("accountMenu");

    accountBtn.addEventListener("click", () => {
        accountMenu.style.right = (accountMenu.style.width - 20) + 'px';
    });
});