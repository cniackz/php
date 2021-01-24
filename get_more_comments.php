<!--
################################################################################
#
#                                   PHP
#
################################################################################
-->
<?php

$numero_de_comentarios = 10;

// From https://www.w3schools.com/php/php_superglobals_post.asp
if ($_SERVER["REQUEST_METHOD"] == 'GET'){

    // This code is to get the comentario and clave from the main page
    $numero_de_comentarios = $_GET['number_of_comments'];

}


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
    LIMIT " . $numero_de_comentarios;

$result = $connection->query($sql);

// From: https://www.w3schools.com/php/php_mysql_select.asp
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
}
echo '<BUTTON type="button" class="botones" id="boton_cargar_comentarios" onclick="load_more_comments("10");">Ver mas comentarios</BUTTON>';
echo '<DIV id="moreComments"></DIV>';
mysqli_close($connection);
?>