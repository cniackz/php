<?php

function print_comentario($nombre, $device, $fecha, $comentario, $id){

$comentario = str_replace("\n", "<BR>", $comentario);

if($device == 'computadora'){
    $device = ' 🖥 ';
} elseif($device == 'celular') {
    // is cel
    $device = ' 📱 ';
} else {
    $device = '';
}

$parrafo = "

<p class=\"label_de_$nombre\">
    $nombre 🕙 $fecha $device<BR>
    <button id=\"$id\" ondblclick=\"funcion_alerta($id, '$nombre');\" class=\"comentario_de_$nombre\">
        $comentario
    </button>
</p>

";
echo $parrafo;

}

// To test
// print_comentario('cesar','compu','hoy','hi','1');

?>