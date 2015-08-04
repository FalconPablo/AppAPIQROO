<?php
//Iniciar sesión para retomar la sesión del login
//Y poder utilizar las variables registradas de sesión
session_start();

$inactivo = 59;
    
    if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
        if($vida_session > $inactivo)
        {
            session_destroy();
            header("Location: http://estadistica.apiqroo.com.mx/apis/login/"); 
        }
    }

    $_SESSION['tiempo'] = time();


//Si la variable de sesión nombreUsuario está vacía significa que no hay sesión abierta y se debe solicitar
//el logeo del usuario
if (empty($_SESSION["nombreUsuario"])) {
//Redireccionamos a la pantalla de logeo
 echo '<script>location.href="http://localhost/appAPIQROO/www/index.html"
</script>';
}
?>