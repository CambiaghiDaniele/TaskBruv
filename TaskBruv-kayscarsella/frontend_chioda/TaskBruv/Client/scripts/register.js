let password2;
let password;
let messageLabel;
let username;
let email;
document.addEventListener("DOMContentLoaded", function() {
    password2 = document.getElementById("password2");
    password = document.getElementById("password");
    messageLabel = document.getElementById("messagelabel");
    username = document.getElementById("username");
    email = document.getElementById("email");
    if(password2) {
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
    } else {
        console.error('Elemento con id "password2" non trovato');
    }
});

function login() {
    if (!email.value || !username.value || !password.value || !password2.value) {
        alert('Tutti i campi sono obbligatori.');
        return false;
    }
    location.href = 'index.html';
}
