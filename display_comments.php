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

?>