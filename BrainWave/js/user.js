// FINISH: Crear un if que no permita que se cree otro usuario con el mismo nombre
document.addEventListener("DOMContentLoaded", function () {
    function validateUsername(username) {
        const regex = /^[a-zA-Z0-9]+$/;
        return regex.test(username);
    }

    // Función para validar la contraseña
    function validatePassword(password) {
        // Al menos una letra mayúscula, un número y longitud mínima de 7 caracteres
        const regex = /^(?=.*[A-Z])(?=.*\d).{7,}$/;
        return regex.test(password);
    }

    // Función para mostrar mensajes de error
    function showError(element, msj) {
        const errorDiv = element.nextElementSibling;
        errorDiv.textContent = msj;
        errorDiv.style.display = 'block';
    }

    // Función para ocultar mensajes de error
    function hideError(element) {
        const errorDiv = element.nextElementSibling;
        errorDiv.textContent = '';
        errorDiv.style.display = 'none';
    }

    function showErrorUser(msj) {
        const errorDiv = document.getElementById("error_user");
        errorDiv.textContent = msj;
        errorDiv.style.display = 'block';
    }

    // Función para ocultar mensajes de error del usuario
    function hideErrorUser() {
        const errorDiv = document.getElementById("error_user");
        errorDiv.textContent = '';
        errorDiv.style.display = 'none';
    }

    // Función para mostrar mensajes de error de la contraseña
    function showErrorPassword(msj) {
        const errorDiv = document.getElementById("error_pwd");
        errorDiv.textContent = msj;
        errorDiv.style.display = 'block';
    }

    // Función para ocultar mensajes de error de la contraseña
    function hideErrorPassword() {
        const errorDiv = document.getElementById("error_pwd");
        errorDiv.textContent = '';
        errorDiv.style.display = 'none';
    }

    // Función para validar el formulario de inicio de sesión
    function validateForm() {
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        const loginButton = document.getElementById('login-btn');

        let valid = true;

        if (usernameInput.value.trim() === '') {
            showErrorUser('Por favor ingrese un nombre de usuario.');
            valid = false;
        } else if (!validateUsername(usernameInput.value.trim())) {
            showErrorUser('El nombre de usuario solo puede contener letras y números.');
            valid = false;
        } else {
            hideErrorUser();
        }

        if (passwordInput.value.trim() === '') {
            showErrorPassword('Por favor ingrese una contraseña.');
            valid = false;
        } else if (!validatePassword(passwordInput.value.trim())) {
            showErrorPassword('La contraseña debe tener al menos una letra mayúscula, un número y tener como mínimo 7 caracteres.');
            valid = false;
        } else {
            hideErrorPassword();
        }

        loginButton.disabled = !valid;

        return valid;
    }

    // Event listener para validar el formulario en el envío
    document.getElementById('myForm').addEventListener('submit', function (event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });
    // Event listener para validar el formulario en cada cambio de entrada
    document.getElementById('username').addEventListener('input', validateForm);
    document.getElementById('password').addEventListener('input', validateForm);
    

    // Captura el formulario de inicio de sesión
    var loginForm = document.getElementById("myForm");

    // Agrega un evento de escucha para el envío del formulario
    loginForm.addEventListener("submit", function (event) {
        // Previene el envío del formulario predeterminado
        event.preventDefault();

        // Captura los datos del formulario
        var formData = new FormData(loginForm);

        // Crea una nueva solicitud XMLHttpRequest
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "processLogin.php", true);

        // Maneja la carga de la solicitud
        xhr.addEventListener("load", function () {
            if (xhr.status === 200) {
                // Respuesta del servidor recibida correctamente
                var response = JSON.parse(xhr.responseText);
                console.log(response);
                if (response.status === "success") {

                    localStorage.setItem('user', JSON.stringify(response.username));
                    // Redirige al usuario a la página de inicio después del inicio de sesión
                    setTimeout(function () {
                        window.location.href = "profileUser.php";
                    }, 1500);
                } else {
                    // FINISH: Que salga un mensaje de error por pantalla/que se ponga el botón momentáneamente en rojo
                }
            } else {
                // Error al enviar la solicitud
                console.error("Error al enviar la solicitud: ", xhr.status);
            }
        });

        // Maneja los errores de red o de la solicitud
        xhr.addEventListener("error", function () {
            console.error("Error de red o de la solicitud al enviar datos.");
        });

        // Envía los datos del formulario
        xhr.send(formData);
    });
});
