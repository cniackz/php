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
#comentario_p
{
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
#comentarios_p{
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
.comentario_de_cesars
{
background-color:Gray; 
color:white;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
#comentario_de_juan
{
background-color:DodgerBlue; 
color:white;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
#comentario_de_gogo
{
background-color:SlateBlue; 
color:white;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
#comentario_de_liz
{
background-color:Violet;
color:white;
font:Verdana, Geneva, sans-serif;
font-size:60px;
}
</style>



<script>
function refrescar_comentarios() {
location.reload();
}
if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
  // true for mobile device
  //document.write("mobile device");
}else{
    // false for not mobile device
    document.addEventListener('DOMContentLoaded', function(event) {
        //the event occurred
        document.getElementById("comentario_p").style.fontSize = '30px';
        if (document.getElementById("clave_p") !== null) {
            document.getElementById("clave_p").style.fontSize = '30px';
            document.getElementById("inputTextClave").style.fontSize = '30px';
            document.getElementById("inputTextClave").style.height = '75px';
        }
        document.getElementById("comentarios_p").style.fontSize = '30px';
        document.getElementById("inputSubmit").style.fontSize = '30px';
        document.getElementById("inputSubmit").style.height = '75px';
        document.getElementById("textareaComentario").style.fontSize = '30px';
        document.getElementById("textareaComentario").style.height = '75px';
        document.getElementById("boton_de_refrescar").style.fontSize = '30px';
        document.getElementById("boton_de_refrescar").style.height = '75px';
        var i;
        for (i = 0; i < document.getElementsByClassName("comentarios_de_liz").length; i++) {
            document.getElementsByClassName("comentarios_de_liz")[i].style.fontSize = '30px';
        }
        for (i = 0; i < document.getElementsByClassName("comentarios_de_cesar").length; i++) {
            document.getElementsByClassName("comentarios_de_cesar")[i].style.fontSize = '30px';
            document.getElementsByClassName("comentarios_de_cesar")[i].style.backgroundColor = 'Gray';
            document.getElementsByClassName("comentarios_de_cesar")[i].style.color = 'white';
        }
        for (i = 0; i < document.getElementsByClassName("comentarios_de_juan").length; i++) {
            document.getElementsByClassName("comentarios_de_juan")[i].style.fontSize = '30px';
        }
        for (i = 0; i < document.getElementsByClassName("comentarios_de_gogo").length; i++) {
            document.getElementsByClassName("comentarios_de_gogo")[i].style.fontSize = '30px';
        }
    })
}
</script>



<!--Esta forma es donde se pone la clave y el comentario -->
<form method="post" action="insert.php">
<?php
// Este codigo es para mostrar la clave solo si se necesita
if(!isset($_COOKIE['usuario'])) {
echo '<p id="clave_p">Clave:</p>';    
echo '<input type="text" name="clave" class="input-text-clave" id="inputTextClave" >'; 
}
?>
    <p id="comentario_p">Comentario:</p>
    <textarea type="text" name="comentario" class="textarea-comentario" id="textareaComentario"></textarea>
    <br>
    <br>
    <input type="submit" value="Enviar" class="input-submit" id="inputSubmit">
</form>



<hr>
<p id="comentarios_p">Comentarios:</p>

<button type="button" id="boton_de_refrescar" onclick="refrescar_comentarios();">Actualizar</button>

<?php



$connection = mysqli_connect('localhost', 'root', '', 'cesar');
if (!$connection) {
 echo "Error: Unable to connect to MySQL." . PHP_EOL;
 echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 exit;
}

$sql = "select @rownum:=@rownum+1 'numero',coments.comentario,coments.nombre,coments.fecha,coments.id from comentarios as coments, (select @rownum:=0)r order by numero desc";
$result = $connection->query($sql);
// From: https://www.w3schools.com/php/php_mysql_select.asp
while( $row = $result->fetch_assoc()){
    $comentario = '<p class="comentarios_de_';
    if ($row['nombre'] == 'cesar'){
        $comentario = $comentario . 'cesar">';
    } elseif($row['nombre'] == 'juan'){
        $comentario = $comentario . 'juan">';
    } elseif($row['nombre'] == 'gogo') {
        $comentario = $comentario . 'gogo">';
    } elseif($row['nombre'] == 'liz'){
        $comentario = $comentario . 'liz">';
    } else {
        $comentario = $comentario . 'anonimo">';
    }
    $comentario = $comentario . 'id: ' . $row['id'] . '<BR>';
    $comentario = $comentario . 'fecha: ' . $row['fecha'];
    $comentario = $comentario . '<BR> nombre: ' . $row['nombre'] . '<BR>';
    $comentario = $comentario . 'comentario: ' . $row['comentario'] . '</p>';
    echo $comentario;
    echo '<BR>';
    echo '<hr>';
}

mysqli_close($connection);
?>
