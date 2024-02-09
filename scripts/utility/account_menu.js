document.addEventListener("DOMContentLoaded", () => {
    let accountBtn = document.getElementById("accountBtn");
    let accountMenu = document.getElementById("accountMenu");

    accountBtn.addEventListener("click", () => {
        accountMenu.classList.add("slideAnimation");
        document.addEventListener("mouseup", (e) => {
            if (!accountMenu.contains(e.target)) {
                accountMenu.classList.remove("slideAnimation");
                accountMenu.classList.add("reverseSlideAnimation");
                accountMenu.classList.remove("reverseSlideAnimation");
            }
        });
    });
});
