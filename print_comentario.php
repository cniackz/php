<?php

function print_parrafo($nombre, $device, $fecha, $comentario, $id, $parent){

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

print_parrafo('cesar','compu','hoy','hi','1','2');

?>