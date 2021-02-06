<?php

function print_parrafo($nombre, $device, $fecha, $comentario, $id, $parent){

echo '

<p class="label_de_$nombre">
    $device
    $fecha
    $comentario
</p>

    ';

}

print_parrafo('cesar','compu','hoy','hi','1','2');

?>