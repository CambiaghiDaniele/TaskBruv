import { getCookieValue } from "./cookieManager.js";

document.addEventListener("DOMContentLoaded", () => {
    let accountBtn = document.getElementById("accountBtn");
    let accountMenu = document.getElementById("accountMenu");
    let homeBtn = document.getElementById("homeBtn");

    accountBtn.addEventListener("click", () => {
        if(getCookieValue("logged")===null||getCookieValue("logged")===false){
            location.replace("https://www.taskbruv.it/login")
        }else{
            accountMenu.classList.add("slideAnimation");
            document.addEventListener("mouseup", (e) => {
            if (!accountMenu.contains(e.target)) {
                accountMenu.classList.remove("slideAnimation");
                accountMenu.classList.add("reverseSlideAnimation");
                accountMenu.classList.remove("reverseSlideAnimation");
            }
        });
        }
    });

    homeBtn.addEventListener("click", () => {
        location.replace("https://www.taskbruv.it/home");
    });
});
