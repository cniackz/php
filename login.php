<head></head>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<FORM method="post" action="create_cookie.php">

<?php

    // Para pedir al usuario que se logie sino hay cookie
    if(!isset($_COOKIE['usuario'])) {
        // no hay cookie debe logearse
        header('Location: general.php'); // Chat general, abierto al publico
    } else {
        if($_COOKIE['usuario'] == 'hola'){
            // Cuando el valor de la cookie es hola, significa que el valor es
            // invalido, entonces el usuario debe logearse de nuevo
        } else {
            
            // Si hay cookie si es la correcta mandalo a index.php donde esta el chat de la familia
            $passwords = array("cch1987", "ejch1994", "jacl1960", "mahp1965", "larh1989");
            for ($x = 0; $x < 5; $x++) {
                if($_COOKIE['usuario'] == $passwords[$x]){
                    header('Location: index.php');
                }
            }

            // Sino es la correcta de la familia, mandalo al general
            header('Location: general.php'); // general logeado, pagina que aun no existe jeje
        }
    }
    echo '<P id="usuario">Usuario:</P>';
    echo '<INPUT type="text" name="usuario" class="to_be_defined">';
    echo '<P id="clave_p">Constraseña:</P>';
    echo '<INPUT type="text" name="contrasenia" class="input-text-clave" id="inputTextClave" >';
    echo '<BR>';
    echo '<BR>';
    echo '<INPUT type="submit" value="Enviar" class="input-submit" id="inputSubmit">';
?>
</FORM>