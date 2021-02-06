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
    $punto_b = $punto_a - 9;

}


$connection = mysqli_connect('localhost', 'root', '', 'cesar');
if (!$connection) {
 echo "Error: Unable to connect to MySQL." . PHP_EOL;
 echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 exit;
}

// Get my cookie
$number_of_hour = 6;
if($_COOKIE['usuario']=='cch1987'){
    $number_of_hour = 5; // Para tener la hora de toronto
}

// Query para seleccionar los comentarios de la base de datos MySQL
// DATE_FORMAT(CONVERT_TZ((fecha),'+00:00','-0" . $number_of_hour . ":00'), '%r') AS fecha, <--- solo me da la hora en am y pm
$sql = "
    SELECT 
        comentario,
        nombre,
        CONVERT_TZ((fecha),'+00:00','-0" . $number_of_hour . ":00') AS fecha,
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
    $comentario = $comentario . '<button id="' . $row['id'] . '" ondblclick="funcion_alerta(' . $row['id'] . ',\''. $row['nombre'] .'\');" class="comentarios_de_';
    $comentario = $comentario . $row['nombre'] .'">'; 
    $comentario = $comentario . $row['comentario'] . '</button></p>';
    echo $comentario;
    echo '<hr>';
}
echo '<DIV id="moreComments' . ($_GET['number_of_comments'] - 10) . '"><BUTTON type="button" class="botones" id="boton_cargar_comentarios" onclick="carga_mas_comentarios_js();">Ver mas</BUTTON>



<!--

Este boton es para que aparezca el boton de arriba despues de que cargamos mas comentarios

-->
<BUTTON type="button" class="botones" onClick="document.getElementById(\'topid\').scrollIntoView();">
    Arriba
</BUTTON>



</DIV>';
//echo '<DIV id="moreComments"></DIV>';
mysqli_close($connection);
?>

