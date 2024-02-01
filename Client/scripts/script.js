let logindiv=null;


async function senddata() {
    let username=document.getElementById("username").value;
    username=username.replaceAll(" ", "");
    let password=document.getElementById("password").value;
    password=password.replaceAll(" ", "");
    try {
      const response = await fetch("http://localhost:8080/backend/logic.php", {
        method: "POST",
        body: JSON.stringify({
          request: "login",
          username: username,
          password: password,
        }),
        headers: {
          "Content-type": "application/json; charset=UTF-8",
        },
        credentials: 'same-origin',
      });
  
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
  
      const json = await response.json();
      const alertDiv=document.createElement("div")
      if(document.querySelector(".login .alert")==null){
        alertDiv.className = json.message === "200" ? "alert alert-primary" : "alert alert-secondary";
        alertDiv.setAttribute("role", "alert");
        alertDiv.textContent = json.message === "200" ? "RIGHT" : "WRONG";
        logindiv.appendChild(alertDiv);
        console.log(document.querySelector(".login .alert"))
      }else{
       let alert= document.querySelector(".login .alert")
       alert.className = json.message === "200" ? "alert alert-primary" : "alert alert-secondary";
       alert.setAttribute("role", "alert");
       alert.textContent = json.message === "200" ? "RIGHT" : "WRONG";
      }
      
      console.log(json);
    } catch (error) {
      console.error("Error:", error.message);
    }
  }
document.addEventListener("DOMContentLoaded", function(){
  logindiv=document.getElementById("login");
  initsidebar();
  
}
 )

 async function initsidebar() {
  const body= document.querySelector("body");

   try {
     const response = await fetch("http://localhost:8080/backend/sidebar.php", {
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
 
}
  