document.addEventListener("DOMContentLoaded", 
async function initsidebar() {
    const body= document.querySelector("body");
  
     try {
       const response = await fetch("https://www.taskbruv.it/PHP/utility/sidebar.php", {
         method: "POST",
         body: JSON.stringify({}),
         headers: {
           "Content-type": "application/text; charset=UTF-8",
         },
         credentials: 'same-origin',
       });
   
       const text = await response.text();
       const newdiv=document.createElement("div")
       newdiv.innerHTML=text;
       body.appendChild(newdiv);
     } catch (error) {
       console.error("Error:", error.message);
     }
   
  });