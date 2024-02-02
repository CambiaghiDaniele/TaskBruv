/* design : https://www.uplabs.com/posts/messaging-app-2db4a257-7f1d-4d1c-970d-4cf6527247ff by Anastasia Marinicheva */
document.addEventListener("DOMContentLoaded", function(){
    const discussions = Array.from(document.querySelectorAll(".chat"));
    console.log(discussions);
   discussions.map((chat)=>chat.addEventListener("click",()=>{
    
    discussions.filter((chat)=>chat.classList.contains("message-active")).map((chat)=>chat.classList.remove("message-active"))
    chat.classList.add("message-active");
   }))
});