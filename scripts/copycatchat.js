/* design : https://www.uplabs.com/posts/messaging-app-2db4a257-7f1d-4d1c-970d-4cf6527247ff by Anastasia Marinicheva */
document.addEventListener("DOMContentLoaded", function(){
    const discussions = Array.from(document.querySelectorAll(".chat"));
    console.log(discussions);
   discussions.map((chat)=>chat.addEventListener("click",()=>{
    
    discussions.filter((chat)=>chat.classList.contains("message-active")).map((chat)=>chat.classList.remove("message-active"))
    chat.classList.add("message-active");
    chatChange(chat);
   }))

});

function chatChange(chat){
let box=document.querySelector(".chat.box")
let header=document.querySelector(".header-chat");
if(header==null){
 header=document.createElement("div")
header.classList.add("header-chat")  
header.innerHTML= '<i class="icon fa fa-user-o" aria-hidden="true"></i><p class="name">'+chat.querySelector(".name").textContent+'</p><i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i>';
let footer=document.createElement("div");
footer.classList.add("footer-chat")
footer.innerHTML='<i class="icon fa fa-smile-o clickable" style="font-size:25pt;" aria-hidden="true"></i><input type="text" class="write-message" placeholder="Type your message here"></input><i class="icon send fa fa-paper-plane-o clickable" aria-hidden="true"></i></>';

box.appendChild(footer);
textbox=document.querySelector(".write-message")
textbox.addEventListener("keydown", (e)=>{
    if(e.key=="Enter"){
        box.appendChild()
        textbox.value="";
    }
})
}else{
header.innerHTML= '<i class="icon fa fa-user-o" aria-hidden="true"></i><p class="name">'+chat.querySelector(".name").textContent+'</p><i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i>';
}
box.appendChild( header)

}



