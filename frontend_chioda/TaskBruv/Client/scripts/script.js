async function senddata() {
    let username=document.getElementById("username").value;
    username=username.replaceAll(" ", "");
    let password=document.getElementById("password").value;
    password=password.replaceAll(" ", "");
    try {
      const response = await fetch("http://localhost/backend/logic.php", {
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
      console.log(json);
    } catch (error) {
      console.error("Error:", error.message);
    }
  }
  function login(){
    location.href = 'login.html';
  }
  document.addEventListener("DOMContentLoaded",function(){
    let password = document.getElementById("password");
    let password2 = document.getElementById("password2");
    let messageLabel = document.getElementById("messagelabel");
  });

    password2.addEventListener("input",function(){
        if (password.value !== password2.value) {
            messageLabel.textContent = 'conferma password:Le password non coincidono';
            messageLabel.style.background = 'red';
        } else {
            messageLabel.textContent = 'le password coincidono';
            messageLabel.style.background = 'green';
        }
    });

  