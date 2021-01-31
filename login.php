<head></head>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<FORM method="post" action="create_cookie.php">

<?php

    // Para pedir al usuario que se logie sino hay cookie
    if(!isset($_COOKIE['usuario'])) {
        // no hay cookie debe logearse
    } else {
        if($_COOKIE['usuario'] == 'hola'){
            // Cuando el valor de la cookie es hola, significa que el valor es
            // invalido, entonces el usuario debe logearse de nuevo
        } else {
            // display chat (send to index.php where we display it)
            header('Location: index.php');
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