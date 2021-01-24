<FORM method="post" action="create_cookie.php">

<?php

    // Este codigo es para mostrar la clave solo si se necesita
    if(!isset($_COOKIE['usuario'])) {
        echo '<P id="usuario">Usuario:</P>';
        echo '<INPUT type="text" name"usuario" class="to_be_defined">';
        echo '<P id="clave_p">Constraseña:</P>';    
        echo '<INPUT type="text" name="clave" class="input-text-clave" id="inputTextClave" >'; 
    } else {
        // display chat
    }
?>
    <INPUT type="submit" value="Enviar" class="input-submit" id="inputSubmit">
</FORM>