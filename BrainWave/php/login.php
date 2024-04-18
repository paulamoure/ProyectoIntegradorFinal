<?php
require_once 'processLogin.php';
require_once 'conecta.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/account.css">
    <title>BrainWave | Login</title>
</head>
<body>
    <!-- Login box -->
    <div class="box">
        <img class="img" src="../img/logo-transp.png" alt="logo cerebro">
        <h2 class="login"> <span class="span">L</span><span class="text-wrapper-2">OGIN</span></h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="myForm">
            <!-- User input -->
            <div class="user-box">
                <input type="text" name="username" id="username">
                <label>Usuario</label>
                <div id="error_user" style="display:none;"></div>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password">
                <a href="#" class="toggle-eye" onclick="togglePasswordVisibility()">
                    <img src="../img/eye-close.png" alt="Toggle Password" id="eye-icon">
                </a>
                <label>Password</label>
                <a href="https://support.google.com/accounts/answer/7682439?hl=es" class="forgotten-pwd">Contraseña Olvidada?</a>
                <div id="error_pwd" style="display:none;"></div>
                <div id="error_login" style="display:none;"></div>
            </div>
            <!-- Login btn -->
            <div class="boton-secundario"><button type="submit" class="button"  id="login-btn">ENTRAR</button></div>
        </form>
        <br>
        <!-- "Footer"  -->
        <div class="crea-cuenta-login">
            <p>No tienes una cuenta?</p><a href="register.php">Crear cuenta</a>
        </div>
        <div class="terms">
            <a href="https://app.privacypolicies.com/wizard/terms-conditions" target="_blank">Términos y Condiciones</a>
        </div><br>
    </div>
    <script src="../js/user.js"></script>
    <script>
        // Función para mostrar/ocultar la contraseña
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.src = '../img/eye-open.png';
            } else {
                passwordInput.type = 'password';
                eyeIcon.src = '../img/eye-close.png';
            }
        }
    </script>
</body>
</html>