<?php

// Aqui esta la funcion que se llama get_comments
require 'display_comments.php';

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
<hr>
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
}

// To test
// print_comentario('cesar','compu','hoy','hi','1');

?>