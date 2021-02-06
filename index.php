<!--
################################################################################
#
#                                   PHP
#
################################################################################
-->
<?php
    // Este codigo es para pedir la clave solo si se necesita
    if(!isset($_COOKIE['usuario'])) {
        // Si la cookie no existe, el usuario debe obtenerla a traves del logeo
        header('Location: login.php');
    } else {
        if($_COOKIE['usuario'] == 'hola'){
            // Cuando el valor de la cookie es hola, significa que el valor es
            // invalido, entonces el usuario debe logearse de nuevo
            header('Location: login.php');
        }
    }
?>

<!--
################################################################################
#
#                                   HTML
#
################################################################################
-->
<!--Esta forma es donde se pone el comentario -->
<head>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="javascript.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"
    >
    </script>
    <script src='https://ili4x.github.io/inputEmoji/inputEmoji.js'></script>
</head>
<body id="body">
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<TABLE id="topid">
    <TR>
        <TH>
            <BUTTON type="button" class="botones" onClick="document.getElementById('h1_grupos').scrollIntoView();">
                Abajo
            </BUTTON>
        </TH>
        <TH>
            <!--BUTTON type="button" class="botones" id="boton_de_logout" onclick="redirect('http://cesarcelis.com/iframe.html');">
                Chats
            </BUTTON-->
        </TH>
        <TH>
            <BUTTON type="button" class="botones" id="boton_de_logout" onclick="logout();">
                Salir
            </BUTTON>
        </TH>
        <TH>
            <!--BUTTON type="button" class="botones" id="tamano_de_letra" onclick="tamano_de_letra();">
                Tamano
            </BUTTON-->
        </TH>
    </TR>
</TABLE>
<HR>
<FORM method="post" action="insert.php">
<DIV id="comentario_referenciado" onclick="quita_la_referencia();" ></DIV>
<INPUT id="parent" type="hidden" name="parent" value="">
<TEXTAREA type="text" name="comentario" class="textarea-comentario" id="textareaComentario"></TEXTAREA>
<BR>
<BR>
<INPUT type="submit" value="Enviar" class="botones" id="inputSubmit">
<?php

$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
    
    // CELULAR
    echo '

    <INPUT type="hidden" name="device" value="celular">

    ';
} else {

    // computadora

    echo '

    <INPUT type="hidden" name="device" value="computadora">

    ';

}

?>  
</FORM>
<HR>

<!--
################################################################################
#
#                                   PHP
#
################################################################################
-->
<?php

// Aqui esta la funcion que tiene la query para traer los comentarios de la base de datos
require 'display_comments.php'; // get_comments.php

// To get db connection
$connection = mysqli_connect('localhost', 'root', '', 'cesar');
if (!$connection) {
 echo "Error: Unable to connect to MySQL." . PHP_EOL;
 echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 exit;
}

// From: https://www.w3schools.com/php/php_mysql_select.asp
$ultimo_comentario = NULL;
// primer comentario es en realidad el ultimo comentario que se ha publicado,
// le puse primer comentario, porque es el primero que se imprime, por ser el
// mas moderno
$primer_comentario = NULL;

// put a container for the new comments retrieved with AJAX on top
echo '<DIV id="moreNewComments"></DIV>';

// To display comments
list($ultimo_comentario,$primer_comentario) = display_comments_function($connection, 'presente', '');

// Este inicializa la variable de javascript de primer comentario viniedo desde
// php de tal suerte que asi tu codigo de javascript sabe a que ids del futuro
// debe buscar, dado que ya sabe a partir de donde buscar y si funciona
// ahora haz un codigo como get_more_comments pero para get_new_comments y pasale
// el id de donde tiene que buscar nuevos ids para que los jale cada 5 segundos.
//echo $primer_comentario;
echo '
<script type="text/javascript">
document.addEventListener(\'DOMContentLoaded\', function() {
   // your code here
   primer_comentario = ' . $primer_comentario . ';
}, false);
</script>';

// Despues de cargar mas comentarios, setea el estilo para PC que se vea bien
$boton = '<DIV id="moreComments"><BUTTON type="button" class="botones" id="boton_cargar_comentarios" ';
$boton = $boton . 'onclick="load_more_comments(';
$boton = $boton . '\'' . $ultimo_comentario . '\');">Ver mas</BUTTON>

<BUTTON type="button" class="botones" onClick="document.getElementById(\'topid\').scrollIntoView();">
    Arriba
</BUTTON>

</DIV>';
echo $boton;
mysqli_close($connection);
?>



<br>
<h1>Informacion Adicional del Chat:</h1>
<br>
<a href="respaldar.php">Descargar todos los comentarios</a>
<h2>Usuarios en este chat:</h2>
<?php
$connection = mysqli_connect('localhost', 'root', '', 'cesar');
if (!$connection) {
 echo "Error: Unable to connect to MySQL." . PHP_EOL;
 echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 exit;
}
$sql = "
    SELECT 
        id_de_usuario,
        nombre,
        password
    FROM
        usuarios
";

$result = $connection->query($sql);

echo '
<TABLE class="borde_en_tabla">
    <TR class="borde_en_tabla">
        <TH class="borde_en_tabla">
            ID del Usuario
        </TH>
        <TH class="borde_en_tabla">
            Nombre del Usuario
        </TH>
        <TH class="borde_en_tabla">
            Password del Usuario
        </TH>
    </TR>
';
while( $row = $result->fetch_assoc()){
    $password = 'Confidencial';
    if($_COOKIE['usuario']==$row['password']){
        $password = $row['password'];
    }
    echo '

    <TR class="borde_en_tabla">
        <TD>' . $row['id_de_usuario'] . '</TD>
        <TD>' . $row['nombre'] . '</TD>
        <TD>' . $password . '</TD>
    </TR>

    ';
}
echo '</TABLE>';
?>

<H1 id="h1_grupos">Otros grupos</H1>
<UL>
    <LI>
        <BUTTON class="botones" onclick="window.location.replace('http://cesarcelis.com/cesar_juan.php');">Juan y Cesar</BUTTON>
    </LI>
    <BR>
    <LI>
        <BUTTON class="botones" onclick="window.location.replace('http://cesarcelis.com/cesar_liz.php');">Liz y Cesar</BUTTON>
    </LI>
</UL>
<BR>
<BR>
<BR>
</body>