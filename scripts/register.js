let password2 = document.getElementById("password2");

let password = document.getElementById("password");

let messageLabel = document.getElementById("messagelabel");

let username = document.getElementById("username");

let email = document.getElementById("email");

let alert = document.getElementById("alert");



password2.addEventListener("input", function() {

    if (password.value !== password2.value) {

        messageLabel.style.display = 'block';

        messageLabel.textContent = 'Le password non coincidono';
        alert.style.top = "72.6%";

        messageLabel.style.color = 'red';

    } else {

        messageLabel.style.display = 'block';

        messageLabel.textContent = 'le password coincidono';

        alert.style.top = "72.6%";

        messageLabel.style.color = 'green';

    }

    if(!password2.value){

        alert.style.top = "70.5%";
        messageLabel.style.display = 'none';

    }

});

function login() {

    if (!email.value || !username.value || !password.value || !password2.value) {

        alert.className = "alert alert-warning";
        alert.style.top = "70.5%";
        alert.style.display = 'block';
        alert.innerHTML = "<strong>Warning!</strong> Tutti i campi sono obbligatori";

        return false;

    }else{

        if(email.value.indexOf("@") < 0){

            alert.className = "alert alert-warning";
            alert.style.top = "70.5%";
            alert.style.display = 'block';
            alert.innerHTML = "<strong>Warning!</strong> L'email non sodisfa i requisiti";

            return false;

        }

    }

    var utente = {

        email: email.value,

        username: username.value,

        password: password.value

    };

    $.ajax({

        url: 'https://www.taskbruv.it/PHP/send.php',

        type: 'POST',

        data: { utente: utente},

        success: function(risposta) {

            console.log(risposta);

        },

        error: function() {

            lert.className = "alert alert-warning";
            alert.style.display = 'block';
            alert.innerHTML = "<strong>Warning!</strong> Si è verificato un errore durante la richiesta AJAX";

            location.href = 'index.html';

        }

    });

}