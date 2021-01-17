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
<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"
>
$(function () {
  $('textarea,input').emoji();
})

$(function () {
  $('textarea,input').emoji({
    button:'&#x1F642;'
  });
})
$(function () {
  $('textarea,input').emoji({
    place:'after'
  });
})
$(function () {
  $('textarea,input').emoji({
    fontSize:'20px'
  });
})
$(function () {

  $('textarea,input').emoji({

    emojis: ['&#x1F642;','&#x1F641;','&#x1f600;','&#x1f601;','&#x1f602;','&#x1f603;','&#x1f604;','&#x1f605;','&#x1f606;','&#x1f607;','&#x1f608;','&#x1f609;','&#x1f60a;','&#x1f60b;','&#x1f60c;','&#x1f60d;','&#x1f60e;','&#x1f60f;','&#x1f610;','&#x1f611;','&#x1f612;','&#x1f613;','&#x1f614;','&#x1f615;','&#x1f616;','&#x1f617;','&#x1f618;','&#x1f619;','&#x1f61a;','&#x1f61b;','&#x1f61c;','&#x1f61d;','&#x1f61e;','&#x1f61f;','&#x1f620;','&#x1f621;','&#x1f622;','&#x1f623;','&#x1f624;','&#x1f625;','&#x1f626;','&#x1f627;','&#x1f628;','&#x1f629;','&#x1f62a;','&#x1f62b;','&#x1f62c;','&#x1f62d;','&#x1f62e;','&#x1f62f;','&#x1f630;','&#x1f631;','&#x1f632;','&#x1f633;','&#x1f634;','&#x1f635;','&#x1f636;','&#x1f637;','&#x1f638;','&#x1f639;','&#x1f63a;','&#x1f63b;','&#x1f63c;','&#x1f63d;','&#x1f63e;','&#x1f63f;','&#x1f640;','&#x1f643;','&#x1f4a9;','&#x1f644;','&#x2620;','&#x1F44C;','&#x1F44D;','&#x1F44E;','&#x1F648;','&#x1F649;','&#x1F64A;']

  });

})
$(function () {

  $('textarea,input').emoji({

    listCSS: {

      position:'absolute',

      border:'1px solid gray',

      background-color:'#fff',

      display:'none'

    }

  });

})
$(function () {

  $('textarea,input').emoji({

    rowSize: 10

  });

})


</script>
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


<textarea name="emoji" placeholder="type message here..."></textarea>
<input name="emoji" placeholder="type message here..." />











































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
