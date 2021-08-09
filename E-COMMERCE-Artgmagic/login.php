<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ArtMagic</title>
        <link rel="stylesheet" href="css/style_login.css">
        <script type="text/javascript" src="js/librarys/jquery-3.4.1.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <script src="js/librarys/sweetalert.min.js" type="text/javascript"></script>
       <!--  <link rel="shortcut icon" href="favicon.ico"> -->
        <link rel="stylesheet" href="css/load.css">
    </head>
    <body>
        <main>
            <div class="logo">
                <!-- <img src="img/escudouteq.png" alt=""> -->
            </div>
            <!-- Contenedor principal -->
            <div class="main_container">
                <!-- Contenedor trasero -->
                <div class="container_t">
                    <!-- Contenedor trasero de login-->
                    <div class="container_t-login">
                        <h3>¿Ya tienes una cuenta? </h3>
                        <p>Inicia sesión para entrar a la página</p>
                        <button id="btn_Login"> Log in </button>
                    </div>
                    <!-- Contenedor trasero de registro-->
                    <div class="container_t-register">
                        <h3>¿Aún no tienes una cuenta? </h3>
                        <p>Registrate para iniciar sesión</p>
                        <button id="btn_register"> Register </button>
                    </div>
                </div>
                <!-- Formulario de login y registro -->
                <div class="container_login-register">
                    <!-- Formulario de login -->
                    <form  class="form_login" id="form_login_id">
                        <h2>Iniciar Sesión</h2>
                        <input  type="text" id="emailuser"  name="emailuser" placeholder="Email">
                        <input type="password" id="passworduser" name="passworduser" placeholder="Password">
                        <button type="submit">Ingresar</button>
                    </form>
                    <!-- Formulario de registro-->
                    <form class="form_register" >
                        <h2>Registrarse</h2>
                        <input type="text" id="nameregister" placeholder="Nombre completo"> 
                        <input type="text" id="emailregister" placeholder="Correo Electronico">
                        <!--<input type="text" id="userregister" placeholder="Usuario">-->
                        <input type="password" id="passwordregister" placeholder="Contraseña">
                        <input type="password" id="passwordConfirm" placeholder="Confirmar Contraseña">
                        <button  id="btregistrar" type="button">Regístrarse</button>
                        <p class="warnings" id="warnings"> </p>
                    </form>
                </div>
            </div>
        </main>


        <div class="load-modal" id="load-modal-id" style="display:none">
            <div class="la-ball-spin-clockwise">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
         </div>
        <script src="js/login/validationlogin.js" type="text/javascript"></script>
        <script src="js/login/validationregister.js" type="text/javascript"></script>
        <script src="js/0_global.js" type="text/javascript"></script>
        <script src="js/design/logindesign.js" type="text/javascript"></script>

    </body>
</html>