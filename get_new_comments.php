<!--
################################################################################
#
#                                   PHP
#
################################################################################
-->
<?php

$punto_a = 0;

// From https://www.w3schools.com/php/php_superglobals_post.asp
if ($_SERVER["REQUEST_METHOD"] == 'GET'){

    // This code is to get the comentario and clave from the main page
    $punto_a = $_GET['number_of_comments'];

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
// DATE_FORMAT(CONVERT_TZ((fecha),'+00:00','-0" . $number_of_hour . ":00'), '%r') AS fecha, <--- Solo me da la hora, le quita la fecha
$sql = "
    SELECT 
        comentario,
        nombre,
        CONVERT_TZ((fecha),'+00:00','-0" . $number_of_hour . ":00') AS fecha,
        id,
        device,
        parent
    FROM
        comentarios 
    WHERE id >  " . $punto_a . " ORDER BY id DESC";
//echo $sql;


$result = $connection->query($sql);

// From: https://www.w3schools.com/php/php_mysql_select.asp
// str_replace("\n", "<BR>", $row['comentario']) <--- Esto es para que respeto los enters que metimos en el comment
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
    if(isset($row['parent'])){
        $sql_parent = "SELECT nombre,fecha,comentario FROM comentarios WHERE id = " . $row['parent'];
        $result_parent = $connection->query($sql_parent);
        $row_parent = $result_parent->fetch_assoc();
        $comentario = $comentario . ' Con respecto a lo que dijo ' . $row_parent['nombre'] . ' el dia ' . $row_parent['fecha'] . ':<BR>' . str_replace("\n", "<BR>", $row_parent['comentario']) . '<BR>Quiero decir que:<BR>';
    }
    $comentario = $comentario . '<button id="' . $row['id'] . '" ondblclick="funcion_alerta(' . $row['id'] . ',\''. $row['nombre'] .'\');" class="comentarios_de_';
    $comentario = $comentario . $row['nombre'] .'">'; 
    $comentario = $comentario . str_replace("\n", "<BR>", $row['comentario']) . '</button></p>';
    echo $comentario;
    echo '<hr>';
}
//echo '<DIV id="moreComments"></DIV>';
mysqli_close($connection);
?>

