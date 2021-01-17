<!--
################################################################################
#
#                                   CSS
#
################################################################################
-->
<style>
.input-text-clave
{
width:800px;
height:150px;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
.textarea-comentario
{
width:800px;
height:300px;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
.input-submit
{
width:300px;
height:150px;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
#clave_p
{
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
#boton_de_refrescar
{
width:400px;
height:150px;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}




.label_de_cesar
{
background-color:Gray; 
color:white;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
.comentarios_de_cesar
{
background-color:Gray; 
color:black;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}





.label_de_juan
{
background-color:DodgerBlue; 
color:white;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
.comentarios_de_juan
{
background-color:DodgerBlue; 
color:black;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}




.label_de_gogo
{
background-color:SlateBlue; 
color:white;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
.comentarios_de_gogo
{
background-color:SlateBlue; 
color:black;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}





.label_de_liz
{
background-color:Violet;
color:white;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
.comentarios_de_liz
{
background-color:Violet;
color:black;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}


</style>












































<!--
################################################################################
#
#                                   JavaScript
#
################################################################################
-->

<!-- You need both sources below to get emojis in the textarea-->
<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"
>
</script>
<script src='https://ili4x.github.io/inputEmoji/inputEmoji.js'></script>

<script type="text/javascript">
// To reload with the button actualizar
function refrescar_comentarios() {
    location.reload();
}

// Para cambiar el estilo con Javascript
if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
    // Es mobile no hagas nada por ahora
} else {

    // Es PC
    // Espera a que cargue la pagina para modificarla
    document.addEventListener(
        'DOMContentLoaded', 
        function(event) {
            
            //the event occurred, ya se cargo la pagina

            // Ponle emojis a tu textarea, ya que se cargo la pagina
            // https://www.jqueryscript.net/form/emoji-picker-input-textarea.html
            // https://ili4x.github.io/inputEmoji/demo.html
            $('textarea').emoji(
                {
                    place: 'after',
                    button:'&#x1F642;'
                }
            );

            // Ahora si modifica el estilo:
            // Solo cambia el Style del elemento clave_p sino es Nulo
            // Recuerda que el elemento es dinamico y puede desaparecer
            // si se proporciona la clave correcta a las cookies
            if (document.getElementById("clave_p") !== null) {
                document.getElementById("clave_p").style.fontSize = '30px';
                document.getElementById("inputTextClave").style.fontSize = '30px';
                document.getElementById("inputTextClave").style.height = '75px';
            }

            // El resto de cosas que queremos modificar cuando es una pc
            document.getElementById("inputSubmit").style.fontSize = '30px';
            document.getElementById("inputSubmit").style.height = '75px';
            document.getElementById("inputSubmit").style.width = '400px';
            document.getElementById("textareaComentario").style.fontSize = '30px';
            document.getElementById("textareaComentario").style.height = '75px';
            document.getElementById("boton_de_refrescar").style.fontSize = '30px';
            document.getElementById("boton_de_refrescar").style.height = '75px';
            document.getElementById("boton_de_refrescar").style.width = '400px';
            var i;

            // Function para eficientar el uso de los cambios de estilo en el
            // for de cada persona, asi solo tengo un for en una funcion en
            // lugar de varios fors por persona
            function loop_por_persona(label, comment, color){
                for(i = 0; i < label.length; i++){
                    label[i].style.fontSize = '30px';
                    label[i].style.backgroundColor = color;
                    label[i].style.color = 'white';
                    label[i].style.marginBottom = '0px';
                    label[i].style.marginTop = '0px';
                    comment[i].style.fontSize = '30px';
                    comment[i].style.fontFamily = 'monospace';
                    comment[i].style.backgroundColor = color;
                    comment[i].style.color = 'black';
                }
            }

            // Creando un diccionario para el usuario y su color
            var dict = {
                'liz': 'Violet',
                'cesar': 'Gray',
                'juan': 'DodgerBlue',
                'gogo': 'SlateBlue'
            };

            // Ahora vamos a loopear en el diccionario para setear los colors
            for(var key in dict){
                var color = dict[key];
                var label = "label_de_";
                var label = label.concat(key);
                var comment = "comentarios_de_";
                var comment = comment.concat(key);
                var label = document.getElementsByClassName(label);
                var comment = document.getElementsByClassName(comment);
                loop_por_persona(label, comment, color);
            }

        }
    )
}
</script>















































<!--
################################################################################
#
#                                   HTML
#
################################################################################
-->
<!--Esta forma es donde se pone la clave y el comentario -->
<BUTTON type="button" id="boton_de_refrescar" onclick="refrescar_comentarios();">
    Actualizar
</BUTTON>
<FORM method="post" action="insert.php">

<?php

    // Este codigo es para mostrar la clave solo si se necesita
    if(!isset($_COOKIE['usuario'])) {
        echo '<P id="clave_p">Clave:</P>';    
        echo '<INPUT type="text" name="clave" class="input-text-clave" id="inputTextClave" >'; 
    }

?>
    <TEXTAREA type="text" name="comentario" class="textarea-comentario" id="textareaComentario"></TEXTAREA>
    <BR>
    <INPUT type="submit" value="Enviar" class="input-submit" id="inputSubmit">
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
$connection = mysqli_connect('localhost', 'root', '', 'cesar');
if (!$connection) {
 echo "Error: Unable to connect to MySQL." . PHP_EOL;
 echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 exit;
}

// Query para seleccionar los comentarios de la base de datos MySQL
$sql = "
    SELECT 
        @rownum:=@rownum+1 'numero',
        coments.comentario,
        coments.nombre,
        coments.fecha,
        coments.id
    FROM
        comentarios AS coments,
        (SELECT @rownum:=0)r 
    ORDER BY
        numero
    DESC
";

$result = $connection->query($sql);

// From: https://www.w3schools.com/php/php_mysql_select.asp
while( $row = $result->fetch_assoc()){
    $comentario = '<p class="label_de_' . $row['nombre'] . '">';
    $comentario = $comentario . $row['nombre'] . ' 🕙 ';
    $comentario = $comentario . $row['fecha'] . '<BR>';
    $comentario = $comentario . '<span class="comentarios_de_';
    $comentario = $comentario . $row['nombre'] .'">'; 
    $comentario = $comentario . $row['comentario'] . '</span></p>';
    echo $comentario;
    echo '<hr>';
}
mysqli_close($connection);
?>
