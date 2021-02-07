<head></head>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<BODY style="background-color: Black">
<FORM method="post" action="create_cookie.php">

<?php

    // Para pedir al usuario que se logie sino hay cookie
    if(!isset($_COOKIE['usuario'])) {
        // no hay cookie debe logearse
        setcookie("usuario", "nuevo", time() + (86400 * 30), "/", 'cesarcelis.com');
    } else {
        if($_COOKIE['usuario'] == 'hola'){
            // Cuando el valor de la cookie es hola, significa que el valor es
            // invalido, entonces el usuario debe logearse de nuevo
        } else {
            
            // Si hay cookie si es la correcta mandalo a index.php donde esta el chat de la familia
            $passwords = array(
                "cch1987", 
                "ejch1994", 
                "jacl1960", 
                "mahp1965", 
                "larh1989",
                "mar1985",
                "mjch1986"
            );
            for ($x = 0; $x < count($passwords); $x++) {
                if($_COOKIE['usuario'] == $passwords[$x]){
                    header('Location: index.php');
                }
            }
        }
    }
    echo '<P id="usuario">Usuario:</P>';
    echo '<INPUT type="text" name="usuario" class="to_be_defined">';
    echo '<P id="clave_p">Constraseña:</P>';
    echo '<INPUT type="password" name="contrasenia" class="input-text-clave" id="inputTextClave" >';
    echo '<BR>';
    echo '<BR>';
    echo '<INPUT type="submit" value="Enviar" class="input-submit" id="inputSubmit">';
?>
</FORM>
</BODY>