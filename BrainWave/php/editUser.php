<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editUser.css" />
</head>

<body>
    <div class="tipo-de-cita">
        <header class="header-area">
            <div class="nav">
                <nav class="site-navbar">
                    <a href="home.php" class="site-logo"><img src="../img/logo-transp.png" alt=""></a>
                    <ul>
                        <li class="item"><a href="psych-list.php">Psicólogos</a></li>
                        <li class="item"><a href="2Recursos.php">recursos</a></li>
                        <li class="item"><a href="aboutus.php">Nosotros</a></li>
                        <li class="button"><a href="../../../Proyecto-Integrador-2/chat/index.php">Chat</a></li>
                        <li class="button"><a href="login.php">LOGIN</a></li>
                    </ul>

                    <button class="nav-toggler">
                        <span></span>
                    </button>
                </nav>
                <div class="head">
                    <h1>Perfíl</h1>
                </div>
            </div>
        </header>
        <div class="div">
            <div class="overlap">
                <div class="overlap-group">
                    <div class="super">
                        <div class="container">
                            <h2>Editar Usuario</h2>
                            <form action="procesar_formulario.php" method="POST">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" required />
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" id="apellidos" name="apellidos" required />
                                <label for="correo">Correo:</label>
                                <input type="email" id="correo" name="correo" required />

                                <label for="descripcion">Descripción:</label>
                                <textarea id="descripcion" name="descripcion"></textarea>

                                <input type="submit" value="Guardar Cambios" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div>
                <h1 class="brainwave2">BRAINWAVE</h1>
            </div>
            <div class="footer">
                <div class="contact-info">
                    <a href="aboutus.php">
                        <div class="contact">CONTÁCTANOS</div>
                    </a>
                    <div style="direction: rtl;">
                        <div class="address">
                            <img src="../img/map-icon.png" alt="" width=20>
                            <p>123 Calle de la Serenidad, Distrito Creativo</p>
                        </div>
                        <div class="email">
                            <img src="../img/gmail-icon.png" alt="" width=20>
                            <p>Brain.wave.us@gmail.com</p>
                        </div>
                    </div>

                </div>
                <div class="contact-info">
                    <div>
                        <h1>Redes Sociales</h1>
                        <div class="social">
                            <img class="footer12-child" alt="" src="../img/facebook.png" width=50 />
                            <img class="footer12-item" alt="" src="../img/twitter.png" width=50 />
                            <img class="footer12-inner" alt="" src="../img/instagram.png" width=50 />
                        </div>
                    </div>
                    <a href="register.php">
                        <div class="subscribe">REGÍSTRATE!</div>
                    </a>
                </div>
                <div class="brainwave-copyright-">
                    brainwave copyright - own elements
                </div>
            </div>
        </footer>

    </div>
</body>

</html>
