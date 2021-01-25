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
#                                   CSS
#
################################################################################
-->
<style>

#espaciador
{
    font-size:60px;
}

.textarea-comentario
{
width:800px;
height:300px;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
.botones
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




.label_de_martha
{
background-color:MediumSeaGreen; 
color:white;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
.comentarios_de_martha
{
background-color:MediumSeaGreen; 
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

// Simulate an HTTP redirect:
function logout() {
    window.location.replace("http://cesarcelis.com/delete_cookie.php");    
}


var ultimo_comentario = 0;
// Carga mas comentarios
// Esta funcion la mando llamar solo la primera vez desde php desde aqui
// la segunda vez, js va a decrementar el id para obtener los siguientes 10
function load_more_comments(str) {

    ultimo_comentario = parseInt(str);

    // load more comments
    var xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("moreComments").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","get_more_comments.php?number_of_comments="+str,true);
    xmlhttp.send();
}


// js decrementa en 10 para los siguientes 10
// usa la variable global para lograr esto
function carga_mas_comentarios_js(){

    ultimo_comentario = ultimo_comentario - 10; // This gives the name of the new div

    // load more comments
    var xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var id = "moreComments" + ultimo_comentario.toString();
        document.getElementById(id).innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","get_more_comments.php?number_of_comments="+ultimo_comentario.toString(),true);
    xmlhttp.send();
}


// esta funcion es para modificar el estilo de PC, a hice porque al jalar mas
// comentarios con Ajax, necesito re ejecutar esta porcion de codigo de javascript
// para poder setear los comentarios con el estilo correcto
function setea_estilo_de_nuevo(){
    // Para cambiar el estilo con Javascript
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        // Es mobile no hagas nada por ahora
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
                        button:'&#x1F643;',
                        fontSize:'120px'
                    }
                );
            }
        )
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
                        button:'&#x1F643;',
                        fontSize:'40px'
                    }
                );

                //the event occurred, ya se cargo la pagina
                // Ahora si modifica el estilo:
                // El resto de cosas que queremos modificar cuando es una pc
                var botones = document.getElementsByClassName("botones");
                var i = 0;
                for(i = 0; i < botones.length; i++){
                    botones[i].style.fontSize = '30px';
                    botones[i].style.height = '75px';
                    botones[i].style.width = '400px';
                }
                document.getElementById("textareaComentario").style.fontSize = '30px';
                document.getElementById("textareaComentario").style.height = '75px';

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
                    'gogo': 'SlateBlue',
                    'martha': 'MediumSeaGreen'
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
}

// Setea el estilo de cel y PC por primera vez
// las siguientes veces manda a llamar de nuevo la funcion
setea_estilo_de_nuevo();
</script>













































<!--
################################################################################
#
#                                   HTML
#
################################################################################
-->
<!--Esta forma es donde se pone el comentario -->
<TABLE>
    <TR>
        <TH>
            <BUTTON type="button" class="botones" id="boton_de_refrescar" onclick="refrescar_comentarios();">
                Actualizar
            </BUTTON>
        </TH>
        <TH>
            <DIV id="espaciador"> Ó </DIV>
        </TH>
        <TH>
            <BUTTON type="button" class="botones" id="boton_de_logout" onclick="logout();">
                Salir
            </BUTTON>
        </TH>
    </TR>
</TABLE>
<HR>
<FORM method="post" action="insert.php">

<?php

    $useragent=$_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
        echo '<INPUT type="hidden" name="device" value="celular">';
    } else {
        echo '<INPUT type="hidden" name="device" value="computadora">';
    }

?>
    <TEXTAREA type="text" name="comentario" class="textarea-comentario" id="textareaComentario"></TEXTAREA>
    <BR>
    <INPUT type="submit" value="Enviar" class="botones" id="inputSubmit">
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
        CONVERT_TZ((coments.fecha),'+00:00','-06:00') AS fecha,
        coments.id,
        coments.device
    FROM
        comentarios AS coments,
        (SELECT @rownum:=0)r 
    ORDER BY
        numero
    DESC
    LIMIT 50
";

$result = $connection->query($sql);

// From: https://www.w3schools.com/php/php_mysql_select.asp
$ultimo_comentario = NULL;
while( $row = $result->fetch_assoc()){
    $comentario = '<p class="label_de_' . $row['nombre'] . '">';
    $comentario = $comentario . $row['nombre'] . ' 🕙 ';
    if($row['device'] == 'computadora'){
        $comentario = $comentario . $row['fecha'] . ' 🖥 ';
    } elseif($row['device'] == 'celular') {
        // is cel
        $comentario = $comentario . $row['fecha'] . ' 📱 ';
    } else {
        $comentario = $comentario . $row['fecha'];
    }
    $comentario = $comentario . '<BR>';
    $comentario = $comentario . '<span class="comentarios_de_';
    $comentario = $comentario . $row['nombre'] .'">'; 
    $comentario = $comentario . $row['comentario'] . '</span></p>';
    echo $comentario;
    echo '<hr>';
    $ultimo_comentario = $row['id'];
}
// Despues de cargar mas comentarios, setea el estilo para PC que se vea bien
$boton = '<DIV id="moreComments"><BUTTON type="button" class="botones" id="boton_cargar_comentarios" ';
$boton = $boton . 'onclick="load_more_comments(';
$boton = $boton . '\'' . $ultimo_comentario . '\');setea_estilo_de_nuevo();">Ver mas comentarios</BUTTON></DIV>';
echo $boton;
mysqli_close($connection);
?>
