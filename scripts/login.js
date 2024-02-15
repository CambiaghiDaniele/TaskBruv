let label = document.getElementById("messagelabel1");
async function senddata() {
    let username=document.getElementById("username").value;
    username=username.replaceAll(" ", "");
    let password=document.getElementById("password").value;
    password=password.replaceAll(" ", "");
    $.ajax({
      url: 'https://www.taskbruv.it/PHP/login.php',

      type: 'POST',

      data: {username: username, password: password,},

      success: function(risposta) {

          if(risposta == true){

          }else if(risposta == false){
            label.textContent = "non sei registrato effettua il register";
          }else if(risposta == null){
            label.textContent = "disastro";
          }

      },

      error: function() {

          console.log('Si è verificato un errore durante la richiesta AJAX');

          location.href = 'index.html';

      }

  });
  }



  