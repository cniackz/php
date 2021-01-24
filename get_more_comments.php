<!--
################################################################################
#
#                                   PHP
#
################################################################################
-->
<?php

$punto_a = 0;
$punto_b = 1;

// From https://www.w3schools.com/php/php_superglobals_post.asp
if ($_SERVER["REQUEST_METHOD"] == 'GET'){

    // This code is to get the comentario and clave from the main page
    $punto_a = $_GET['number_of_comments'] - 1;
    $punto_b = $punto_a - 10;

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
        comentario,
        nombre,
        CONVERT_TZ((fecha),'+00:00','-06:00') AS fecha,
        id,
        device
    FROM
        comentarios 
    WHERE id BETWEEN  " . $punto_b . " AND " . $punto_a . " ORDER BY id DESC";
//echo $sql;


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
echo '<DIV id="moreComments"><BUTTON type="button" class="botones" id="boton_cargar_comentarios" onclick="carga_mas_comentarios_js();">Ver mas comentarios</BUTTON></DIV>';
//echo '<DIV id="moreComments"></DIV>';
mysqli_close($connection);
?>