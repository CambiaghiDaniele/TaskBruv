/* design : https://www.uplabs.com/posts/messaging-app-2db4a257-7f1d-4d1c-970d-4cf6527247ff by Anastasia Marinicheva */

let chatbox;
let scrolled=false;
document.addEventListener("DOMContentLoaded", function(){
    const discussions = Array.from(document.querySelectorAll(".chat"));
// console.log(postRequest("http://localhost:8080/backend/fetchchats.php",{mail: "gino@gmail.com"}));
// console.log(discussions);
//add event listener to all chats
   discussions.map((chat)=>chat.addEventListener("click",()=>{
    // deselecting all the chats, and marking only the one in use
    discussions.filter((chat)=>chat.classList.contains("message-active")).map((chat)=>chat.classList.remove("message-active"))
    chat.classList.add("message-active");
    chatChange(chat);
   }))

});

function chatChange(chat){
    
let box=document.querySelector(".chat.box")

let header=document.querySelector(".header-chat");

let footer
if(header==null){
    //if the header is not set yet, create a new one from scratch 
 header=document.createElement("div")
header.classList.add("header-chat")  
header.innerHTML= '<i class="icon fa fa-user-o" aria-hidden="true"></i><p class="name">'+chat.querySelector(".name").textContent+'</p><i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i>';
//create the footer(text input)
footer=document.createElement("div");
footer.classList.add("footer-chat")
footer.innerHTML='<i class="icon fa fa-smile-o clickable" style="font-size:25pt;" aria-hidden="true"></i><input type="text" class="write-message" placeholder="Type your message here"></input><i class="icon send fa fa-paper-plane-o clickable" aria-hidden="true"></i></>';
//create the chatbox
chatbox=document.createElement("div");
chatbox.classList.add("messages-chat");
// Notification.requestPermission().then((result) => {
//     console.log(result);
//   });


//append everythiing to the main container
box.appendChild( header)
box.appendChild(chatbox);
box.appendChild(footer);

//style the chatbox height to a set amount of px
//now the chatbox can be scrollable
chatbox.style.height=(box.clientHeight-header.clientHeight-footer.clientHeight).toString()+"px"

//whenever writing a msg
textbox=document.querySelector(".write-message")
textbox.addEventListener("keydown", (e)=>{
    if(e.key=="Enter"){
        if(textbox.value.replace(" ", "")!=""){
           addMessage(chatbox,textbox.value)
            textbox.value="";
        }
    }
})
}else{
header.innerHTML= '<i class="icon fa fa-user-o" aria-hidden="true"></i><p class="name">'+chat.querySelector(".name").textContent+'</p><i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i>';
chatbox=document.querySelector(".messages-chat");
}
addResponse(chatbox,"culo")
chatbox.addEventListener("scroll",function(){
    scrolled=true;
    console.log("scrolled")
})
}


function addResponse(chatbox,text){
    
    let newmessage=document.createElement("div");
    newmessage.classList.add("message")
    
    newmessage.classList.add("response")
//     if(talker==undefined||talker){
// newmessage.innerHTML='<div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);"></div><p class="text"> '+text+' </p>'
//     }else{
        newmessage.classList.add("text-only")
        newmessage.innerHTML='<p class="text"> '+text+' </p>'
        const photo=document.querySelector(".message .response .photo")
// }
  
    chatbox.appendChild(newmessage)
    if(!scrolled){
        chatbox.scrollTop=chatbox.scrollHeight;
        scrolled=false;
    }
    
}
function addMessage(chatbox,text){
    let newmessage=document.createElement("div");
    newmessage.classList.add("message")
   //if talker is not set yet i am 100% the first, but if talker is false then is 100% the other guy
    // if(talker==undefined ||!talker){
    //     newmessage.innerHTML='<div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);"></div><p class="text"> '+text+' </p>'
    // }else{
        newmessage.classList.add("text-only")
        newmessage.innerHTML='<p class="text"> '+text+' </p>'
    // }
   
    chatbox.appendChild(newmessage)
    if(!scrolled){
        chatbox.scrollTop=chatbox.scrollHeight;
        scrolled=false;
    }
   
}



