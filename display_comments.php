<?php

// Esta funcion es para obtener los comentarios de una query
// La query es casi la misma para los tres archivos:
// index.php, get_more_comments.php y get_new_comments.php
// la idea es modificar la query mediante el where clause y
// asi poder reusar el codigo en un solo lugar para los tres
// de tal suerte que si cambias un row en el select se cabmia para los 3
// ejemplo, quieres 8 pm en lugar de 20 horas, ya solo cambias un lugar
// y no tres, es hacer core functions pero atomticas.
function get_comments($db_connection, $where_clause, $number_of_hour, $limit){
    // Query para seleccionar los comentarios de la base de datos MySQL
    // --DATE_FORMAT(CONVERT_TZ((coments.fecha),'+00:00','-0" . $number_of_hour . ":00'), '%r') AS fecha,
    $fechirri = "CONVERT_TZ((fecha),'+00:00','-0" . $number_of_hour . ":00') AS fecha";
    $sql = "
        SELECT 
            comentario,
            nombre,
            $fechirri,
            id,
            device,
            parent
        FROM
            comentarios
        
        $where_clause
        
        ORDER BY
            id DESC
        
        $limit
    ";

    return $db_connection->query($sql);
}

// Aqui esta la funcion que se llama get_comments
// require 'display_comments.php'; // No lo importes aqui porque ya se importo en otro lado, es problematico no como en python

function print_comentario($nombre, $device, $fecha, $comentario, $id, $hierarchy){

    $comentario = str_replace("\n", "<BR>", $comentario);

    if($device == 'computadora'){
        $device = ' 🖥 ';
    } elseif($device == 'celular') {
        // is cel
        $device = ' 📱 ';
    } else {
        $device = '';
    }

    // Es para que el comentario hijo se haga mas a la derecha del padre y se idente
    if($hierarchy == 'parent'){
        $hierarchy = 'margin-left: 0px';
    } elseif ($hierarchy == 'child'){
        $hierarchy = 'margin-left: 10px';
    }

    $parrafo = "

<p style=\"$hierarchy\" class=\"label_de_$nombre\">
    $nombre 🕙 $fecha $device<BR>
    <button id=\"$id\" ondblclick=\"funcion_alerta($id, '$nombre');\" class=\"comentarios_de_$nombre\">
        $comentario
    </button>
</p>

    ";
    echo $parrafo;

}

function print_real_comentario($connection, $row, $number_of_hour){
    // Utiliza las funciones core para imprimir parrafo padre y parrafo hijo
    $margin_left = 'parent';
    if(isset($row['parent'])){
        // Utiliza la funcion core para obtener la row del padre
        $where_clause = ' WHERE id = ' . $row['parent'] . ' ';
        $limit = '';
        $result_parent = get_comments($connection, $where_clause, $number_of_hour, $limit);
        $row_parent = $result_parent->fetch_assoc();
        print_comentario(
            $row_parent['nombre'],
            $row_parent['device'],
            $row_parent['fecha'],
            $row_parent['comentario'],
            $row_parent['id'],
            $margin_left
        );
        $margin_left = 'child';
    }
    print_comentario(
        $row['nombre'], 
        $row['device'], 
        $row['fecha'], 
        $row['comentario'], 
        $row['id'],
        $margin_left
    );
    echo '<hr>'; // Solo imprimelo al final del real comentario que incluye al padre y al hijo
}



?>