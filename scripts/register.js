let password2 = document.getElementById("password2");
let password = document.getElementById("password");
let messageLabel = document.getElementById("messagelabel");
let username = document.getElementById("username");
let email = document.getElementById("email");

password2.addEventListener("input", function() {
    if (password.value !== password2.value) {
        messageLabel.style.display = 'block';
        messageLabel.textContent = 'conferma password : Le password non coincidono';
        messageLabel.style.color = 'red';
    } else {
        messageLabel.style.display = 'block';
        messageLabel.textContent = 'le password coincidono';
        messageLabel.style.color = 'green';
    }
    if(!password2.value){
        messageLabel.style.display = 'none';
    }
});
function login() {
    if (!email.value || !username.value || !password.value || !password2.value) {
        alert('Tutti i campi sono obbligatori.');
        return false;
    }else{
        if(email.value.indexOf("@") < 0){
            alert("l'email inserita non va bene");
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
            console.log('Si è verificato un errore durante la richiesta AJAX');
            location.href = 'index.html';
        }
    });
}