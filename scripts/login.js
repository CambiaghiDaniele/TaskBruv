let alert = document.getElementById("alert");
async function senddata() {
    let username=document.getElementById("username");
    let password=document.getElementById("password");
    if (!username.value || !password.value ) {
      alert.className = "alert alert-warning";
      alert.style.display = 'block';
      alert.innerHTML = "<strong>Warning!</strong> Tutti i campi sono obbligatori";
      return false;
    }
    username=username.value.replaceAll(" ", "");
    password=password.value.replaceAll(" ", "");
    $.ajax({
      url: 'https://www.taskbruv.it/PHP/login.php',

      type: 'POST',
  
      data: {username: username, password: password,},

      success: function(risposta) {

          if(risposta == true){

          }else if(risposta == false){
            alert.className = "alert alert-warning";
            alert.style.display = 'block';
            alert.innerHTML = "<strong>Warning!</strong> non hai efffettuato la registrazione registrati";
          }else if(risposta == null){
            alert.className = "alert alert-danger";
            alert.style.display = 'block';
            alert.innerHTML = "<strong>Warning!</strong> disastro esistono più accaunt con lo stesso nome utente";
          }

      },

      error: function() {

          lert.className = "alert alert-warning";
          alert.style.display = 'block';
          alert.innerHTML = "<strong>Warning!</strong> Si è verificato un errore durante la richiesta AJAX";

          location.href = 'index.html';

      }

  });
  }



  